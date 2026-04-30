<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Absensi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $pelatihId    = auth()->id();
        $totalMateri  = Materi::where('pelatih_id', $pelatihId)->count();
        $totalJadwal  = Jadwal::count();
        $totalMurid   = User::where('role', 'murid')->count();

        $recentMateri = Materi::where('pelatih_id', $pelatihId)
            ->orderBy('created_at', 'desc')->take(5)->get();

        $jadwal = Jadwal::orderBy('hari')->get();

        return view('pelatih.dashboard', compact(
            'totalMateri', 'totalJadwal', 'totalMurid', 'recentMateri', 'jadwal'
        ));
    }
}
