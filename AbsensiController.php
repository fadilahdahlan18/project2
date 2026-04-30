<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use App\Models\Jadwal;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $tanggal   = $request->get('tanggal', today()->toDateString());
        $jadwal_id = $request->get('jadwal_id');

        $absensi = Absensi::with(['user', 'jadwal'])
            ->when($jadwal_id, fn($q) => $q->where('jadwal_id', $jadwal_id))
            ->when($tanggal, fn($q) => $q->where('tanggal', $tanggal))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $jadwalList = Jadwal::orderBy('nama_kelas')->get();

        return view('pelatih.absensi.index', compact('absensi', 'jadwalList', 'tanggal', 'jadwal_id'));
    }

    public function create()
    {
        $muridList  = User::where('role', 'murid')->orderBy('nama')->get();
        $jadwalList = Jadwal::orderBy('nama_kelas')->get();
        return view('pelatih.absensi.create', compact('muridList', 'jadwalList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id'                => 'required|exists:jadwal,id',
            'tanggal'                  => 'required|date',
            'absensi'                  => 'required|array',
            'absensi.*.user_id'        => 'required|exists:users,id',
            'absensi.*.status'         => 'required|in:hadir,izin,alpha',
        ]);

        foreach ($request->absensi as $item) {
            Absensi::updateOrCreate(
                ['user_id' => $item['user_id'], 'jadwal_id' => $request->jadwal_id, 'tanggal' => $request->tanggal],
                ['status'  => $item['status']]
            );
        }

        return redirect()->route('pelatih.absensi')->with('success', 'Absensi berhasil disimpan.');
    }

    public function edit($id)
    {
        $absensi    = Absensi::findOrFail($id);
        $muridList  = User::where('role', 'murid')->orderBy('nama')->get();
        $jadwalList = Jadwal::orderBy('nama_kelas')->get();
        return view('pelatih.absensi.edit', compact('absensi', 'muridList', 'jadwalList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,alpha',
        ]);
        Absensi::findOrFail($id)->update(['status' => $request->status]);
        return redirect()->route('pelatih.absensi')->with('success', 'Absensi diperbarui.');
    }
}
