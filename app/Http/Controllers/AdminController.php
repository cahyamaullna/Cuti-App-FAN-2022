<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin', 0)->latest()->paginate(10);
        $title = 'data akun';
        return view('admin.pegawai.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = 'buat data';
        return view('admin.pegawai.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'unique:users', 'email'],
            'npp' => ['required', 'min:5', 'numeric', 'unique:users'],
            'posisi' => ['required']
        ]);

        $cost = [ 'cost' => 10 ];
        $validate['password'] = password_hash('fanintek2022', PASSWORD_DEFAULT, $cost);

        User::create($validate);
        return redirect('/admin/data-pegawai')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/data-pegawai')->with('delete', 'Data berhasil dihapus!');
    }
}
