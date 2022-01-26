<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 10;
        $search = User::where('is_admin', 0)->latest();
        if ($request->search) {
            $search->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('npp', 'like', '%' . $request->search . '%')
                ->orWhere('posisi', 'like', '%' . $request->search . '%');
        }
        $data = $search->paginate($pagination);
        $title = 'data pegawai';
        return view('admin.pegawai.index', compact('title', 'data'))
            ->with('i', ($request->input('page', 1) - 1) * $pagination);
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
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'npp' => ['required', 'numeric', 'unique:users'],
            'posisi' => ['required']
        ]);

        $cost = ['cost' => 10];
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
