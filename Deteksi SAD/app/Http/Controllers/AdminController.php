<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 👉 Dashboard Admin
    public function dashboard()
    {
        // Total pengguna yang punya riwayat diagnosa
        $totalUsers = User::has('diagnosas')->count();

        // Data distribusi diagnosa berdasarkan keterangan
        $diagnosaCounts = Diagnosa::select('keterangan')
            ->selectRaw('count(*) as total')
            ->groupBy('keterangan')
            ->get();

        $chartLabels = $diagnosaCounts->pluck('keterangan');
        $chartData = $diagnosaCounts->pluck('total');

        return view('admin.dashboard', compact('totalUsers', 'chartLabels', 'chartData'));
    }

    // 👉 Tampilkan semua gejala
    public function gejala()
    {
        $gejalas = Gejala::all();
        return view('admin.daftar_gejala', compact('gejalas'));
    }

    // 👉 Simpan gejala baru
    public function storeGejala(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        // 🔹 Generate kode otomatis (G01, G02, dst.)
        $last = Gejala::orderBy('kode', 'desc')->first();
        $nextId = $last ? (int) substr($last->kode, 1) + 1 : 1;
        $kode = 'G' . str_pad($nextId, 2, '0', STR_PAD_LEFT);

        Gejala::create([
            'kode' => $kode,
            'nama_gejala' => $request->nama_gejala,
        ]);

        return back()->with('success', 'Gejala berhasil ditambahkan.');
    }

    // 👉 Form edit gejala
    public function editGejala($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('admin.edit_gejala', compact('gejala'));
    }

    // 👉 Update gejala
    public function updateGejala(Request $request, $id)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->only('nama_gejala'));

        return redirect()->route('admin.gejala')->with('success', 'Gejala berhasil diperbarui.');
    }

    // 👉 Hapus gejala
    public function deleteGejala($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('admin.gejala')->with('success', 'Gejala berhasil dihapus.');
    }

    // 👉 Riwayat diagnosa semua user
    public function riwayat()
    {
        $riwayat = Diagnosa::with('user')->latest()->get();
        return view('admin.riwayat', compact('riwayat'));
    }

    // ✅ Hapus riwayat diagnosa (admin)
    public function destroyRiwayat($id)
    {
        $riwayat = Diagnosa::findOrFail($id);
        $riwayat->delete(); // Hanya hapus riwayat, user tetap aman

        return redirect()->route('admin.riwayat')->with('success', 'Riwayat diagnosa berhasil dihapus.');
    }
}
