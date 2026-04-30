<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');

        $pembayaran = Pembayaran::with('user')
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.pembayaran.index', compact('pembayaran', 'status'));
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('user')->findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    public function create()
    {
        $murids = \App\Models\User::where('role', 'murid')->orderBy('nama')->get();
        return view('admin.pembayaran.create', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jumlah'  => 'required|numeric|min:0',
            'status'  => 'required|in:pending,disetujui,ditolak',
            'keterangan' => 'nullable|string',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('user_id', 'tanggal', 'jumlah', 'status', 'keterangan');

        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti-pembayaran', 'public');
        }

        Pembayaran::create($data);

        return redirect()->route('admin.pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $murids = \App\Models\User::where('role', 'murid')->orderBy('nama')->get();
        return view('admin.pembayaran.edit', compact('pembayaran', 'murids'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jumlah'  => 'required|numeric|min:0',
            'status'  => 'required|in:pending,disetujui,ditolak',
            'keterangan' => 'nullable|string',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('user_id', 'tanggal', 'jumlah', 'status', 'keterangan');

        if ($request->hasFile('bukti_transfer')) {
            if ($pembayaran->bukti_transfer) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($pembayaran->bukti_transfer);
            }
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti-pembayaran', 'public');
        }

        $pembayaran->update($data);

        return redirect()->route('admin.pembayaran')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function validasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        Pembayaran::findOrFail($id)->update(['status' => $request->status]);

        $msg = $request->status === 'disetujui' ? 'Pembayaran disetujui.' : 'Pembayaran ditolak.';
        return redirect()->route('admin.pembayaran')->with('success', $msg);
    }

    public function destroy($id)
    {
        Pembayaran::findOrFail($id)->delete();
        return redirect()->route('admin.pembayaran')->with('success', 'Data pembayaran dihapus.');
    }
}
