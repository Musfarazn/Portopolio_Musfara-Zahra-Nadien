<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Rule;
use App\Models\Jawaban;
use App\Services\FuzzyTsukamoto;
use App\Services\AISaranService;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    // ====================================================
    // 🔹 Form diagnosa
    // ====================================================
    public function index()
    {
        $gejala = Gejala::all();
        return view('user.diagnosa', compact('gejala'));
    }

    // ====================================================
    // 🔹 Simpan hasil diagnosa
    // ====================================================
    public function store(Request $request)
    {
        $jawaban = $request->input('jawaban', []);

        if (empty($jawaban)) {
            return back()->with('error', 'Silakan isi semua jawaban terlebih dahulu.');
        }

        \Log::info('Jumlah jawaban: ' . count($jawaban));
        \Log::info('Isi jawaban:', $jawaban);

        // ----------------------------------------
        // 1. Ambil nilai setiap gejala G01–G07
        // ----------------------------------------
        $G = [];
        for ($i = 1; $i <= 7; $i++) {
            $kode = 'G' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $gejala = Gejala::where('kode', $kode)->first();
            if ($gejala && isset($jawaban[$gejala->id])) {
                $G[$kode] = (int) $jawaban[$gejala->id];
            } else {
                $G[$kode] = 0;
            }
        }

        // ----------------------------------------
        // 2. Hitung total skor
        // ----------------------------------------
        $totalSkor = array_sum($G);

        \Log::info('Skor per gejala:', $G);
        \Log::info('Total skor keseluruhan: ' . $totalSkor);

        // ----------------------------------------
        // 3. Proses Fuzzy Tsukamoto DASS-Anxiety
        // ----------------------------------------
        $hasil = FuzzyTsukamoto::hitung(
            $G['G01'], $G['G02'], $G['G03'],
            $G['G04'], $G['G05'], $G['G06'], $G['G07']
        );

        // ----------------------------------------
        // 4. Simpan hasil diagnosa
        // ----------------------------------------
        $diagnosa = Diagnosa::create([
            'user_id'    => Auth::id(),
            'hasil'      => $hasil,
            'keterangan' => "Total skor: {$totalSkor}",
        ]);

        // ----------------------------------------
        // 5. Simpan jawaban tiap gejala
        // ----------------------------------------
        foreach ($jawaban as $gejala_id => $nilai) {
            Jawaban::create([
                'diagnosa_id' => $diagnosa->id,
                'gejala_id'   => $gejala_id,
                'nilai'       => $nilai,
            ]);
        }

        // ----------------------------------------
        // 6. Redirect ke halaman riwayat
        // ----------------------------------------
        return redirect()->route('diagnosa.hasil', $diagnosa->id)
        ->with('success', 'Diagnosa DASS-Anxiety berhasil disimpan.');
    }

    // ====================================================
    // 🔹 Tampilkan hasil diagnosa
    // ====================================================
    public function hasil($id)
    {
        $user = Auth::user();

        // Admin bisa akses semua hasil
        if ($user->role === 'admin') {
            $diagnosa = Diagnosa::with('jawaban.gejala')->findOrFail($id);
        } else {
            // User biasa hanya bisa akses miliknya sendiri
            $diagnosa = Diagnosa::with('jawaban.gejala')
                ->where('id', $id)
                ->where('user_id', $user->id)
                ->firstOrFail();
        }

        // === Saran otomatis (fallback lokal) ===
        $saranOtomatis = match ($diagnosa->hasil) {
            'Normal' => "Hasil menunjukkan Anda dalam kondisi normal. Tidak ada tanda-tanda kecemasan yang signifikan. Pertahankan keseimbangan hidup dengan pola tidur, makan, dan aktivitas yang sehat. Terus jaga interaksi sosial dan lakukan kegiatan yang menyenangkan untuk menjaga kesehatan mental.",
            'Ringan' => "Anda menunjukkan tanda kecemasan ringan. Disarankan untuk melakukan relaksasi sederhana seperti pernapasan dalam, meditasi ringan, atau berolahraga. Hindari stres berlebihan dan tetap jaga rutinitas sehat. Jika kecemasan terasa meningkat, lakukan refleksi diri atau bercerita dengan orang yang dipercaya.",
            'Sedang' => "Kecemasan sedang terdeteksi. Mungkin Anda mulai sering merasa cemas dalam berbagai situasi. Coba lakukan teknik manajemen stres seperti meditasi, journaling, atau berbicara dengan teman/keluarga. Jika mulai mengganggu aktivitas harian, pertimbangkan untuk berkonsultasi dengan konselor atau psikolog.",
            'Berat' => "Hasil menunjukkan tingkat kecemasan yang tinggi. Anda disarankan segera berkonsultasi dengan psikolog atau profesional kesehatan mental. Sambil menunggu, lakukan aktivitas yang menenangkan seperti jalan kaki, mendengarkan musik lembut, atau latihan pernapasan. Jangan menghadapi kecemasan sendirian — mintalah dukungan dari orang terdekat.",
            default => "Belum ada saran yang sesuai untuk hasil diagnosa ini.",
        };

        // === Saran dari AI ===
        try {
            $saranAI = AISaranService::generate($diagnosa->hasil);
        } catch (\Exception $e) {
            $saranAI = "⚠️ Sistem AI sementara tidak tersedia. Berikut saran otomatis sebagai referensi:\n\n" . $saranOtomatis;
        }

        return view('user.hasil', [
            'diagnosa' => $diagnosa,
            'saran_otomatis' => $saranOtomatis,
            'saran_ai' => $saranAI,
        ]);
    }
}
