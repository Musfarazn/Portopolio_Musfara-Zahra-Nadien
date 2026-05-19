<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosa;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua diagnosa user yang login
        $riwayat = Auth::user()->diagnosas()->latest()->get();
        return view('user.riwayat', compact('riwayat'));
    }

    public function destroy($id)
    {
        // Cari diagnosa berdasarkan ID dan user yang login
        $riwayat = Diagnosa::where('id', $id)
                           ->where('user_id', Auth::id())
                           ->firstOrFail();

        $riwayat->delete();

        return redirect()->route('riwayat.index')
                         ->with('success', 'Riwayat berhasil dihapus.');
    }
}
