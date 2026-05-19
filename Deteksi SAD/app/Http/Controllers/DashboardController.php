<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diagnosa;
use App\Models\Gejala;

class DashboardController extends Controller
{
    // 👉 Dashboard untuk admin
    public function admin()
    {
        // Total pengguna yang punya riwayat diagnosa
        $totalUsers = User::has('diagnosas')->count();

        // Total gejala
        $totalGejala = Gejala::count();

        // Total riwayat diagnosa
        $totalRiwayat = Diagnosa::count();

        // Data distribusi diagnosa berdasarkan keterangan
        $diagnosaCounts = Diagnosa::select('keterangan')
            ->selectRaw('count(*) as total')
            ->groupBy('keterangan')
            ->get();

        $chartLabels = $diagnosaCounts->pluck('keterangan');
        $chartData = $diagnosaCounts->pluck('total');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalGejala',
            'totalRiwayat',
            'chartLabels',
            'chartData'
        ));
    }

    // 👉 Dashboard untuk user
    public function user()
    {
        return view('user.dashboard');
    }
}
