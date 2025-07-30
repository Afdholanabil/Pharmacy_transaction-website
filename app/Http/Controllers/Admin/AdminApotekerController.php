<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminApotekerController extends Controller
{
    public function index() {
        $apotekers = User::with('absensiHariIni')->where('role', 'apoteker')->paginate(10);
        return view('admin.apoteker.index', compact('apotekers'));
    }

    public function create() {
        $jabatans = Jabatan::all();
        return view('admin.apoteker.create', compact('jabatans'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
            'alamat' => ['nullable', 'string'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'apoteker',
            'jabatan_id' => $request->jabatan_id,
            'alamat' => $request->alamat,
            'status_aktif' => true,
        ]);

        return redirect()->route('admin.apoteker.index')->with('success', 'Apoteker baru berhasil ditambahkan.');
    }

    public function edit(User $apoteker) {
        $jabatans = Jabatan::all();
        return view('admin.apoteker.edit', compact('apoteker', 'jabatans'));
    }

    public function update(Request $request, User $apoteker) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
        ]);

        $apoteker->update($request->only(['name', 'alamat', 'jabatan_id']));
        return redirect()->route('admin.apoteker.index')->with('success', 'Data apoteker berhasil diperbarui.');
    }

    public function destroy(User $apoteker) {
        $apoteker->delete();
        return redirect()->route('admin.apoteker.index')->with('success', 'Data apoteker berhasil dihapus.');
    }
}
