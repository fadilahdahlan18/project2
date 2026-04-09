<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role  = $request->get('role', 'murid');
        $search = $request->get('search');

        $users = User::where('role', $role)
            ->when($search, fn($q) => $q->where('nama', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%"))
            ->orderBy('nama')
            ->paginate(10);

        return view('admin.users.index', compact('users', 'role', 'search'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:pelatih,murid',
            'no_hp'    => 'nullable|string|max:20',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto-users', 'public');
        }

        User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'no_hp'    => $request->no_hp,
            'foto'     => $fotoPath,
        ]);

        return redirect()->route('admin.users', ['role' => $request->role])
            ->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|in:pelatih,murid',
            'no_hp' => 'nullable|string|max:20',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($user->foto) Storage::disk('public')->delete($user->foto);
            $user->foto = $request->file('foto')->store('foto-users', 'public');
        }

        $user->nama  = $request->nama;
        $user->email = $request->email;
        $user->role  = $request->role;
        $user->no_hp = $request->no_hp;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users', ['role' => $user->role])
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $role = $user->role;
        if ($user->foto) Storage::disk('public')->delete($user->foto);
        $user->delete();

        return redirect()->route('admin.users', ['role' => $role])
            ->with('success', 'Data pengguna berhasil dihapus.');
    }
}
