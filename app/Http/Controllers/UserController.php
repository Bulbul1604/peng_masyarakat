<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('akses', '!=', 'admin')->get();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = User::roles();
        return view('users.create', compact('roles'));
    }
    public function store(UserRequest $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->akses),
            'akses' => $request->akses,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('users.index')->with('success', 'Data user login berhasil ditambahkan!');
    }
    public function edit(string $id)
    {
        $roles = User::roles();
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'roles'));
    }
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        $user = User::findOrFail($id);
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Data user login berhasil diubah!');
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data user login berhasil dihapus!');
    }
}
