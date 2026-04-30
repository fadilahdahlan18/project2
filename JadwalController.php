<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::orderBy('hari')->orderBy('jam')->paginate(10);
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'hari'       => 'required|string',
            'jam'        => 'required|string',
        ]);

        Jadwal::create($request->only('nama_kelas', 'hari', 'jam'));

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'hari'       => 'required|string',
            'jam'        => 'required|string',
        ]);

        Jadwal::findOrFail($id)->update($request->only('nama_kelas', 'hari', 'jam'));

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil dihapus.');
    }
}
