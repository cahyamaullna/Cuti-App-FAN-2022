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
        $users = User::where('is_admin', 0)
            ->whereNotIn('posisi', ['karyawan', 'direktur'])
            ->latest()
            ->get();
        $title = 'buat akun';
        return view('admin.pegawai.create', compact('title', 'users'));
    }

    public function store(Request $request)
    {

        $rule = [
            'nama' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'npp' => ['required', 'numeric', 'unique:users'],
            'posisi' => ['required'],
            'atasan_id' => ['nullable']
        ];

        if ($request->posisi == 'karyawan' || $request->posisi == 'atasan') {
            $rule['atasan_id'] = ['required', 'min:1'];
        }

        $validate = $request->validate($rule);
        $validate['atasan_id'] = (int)$request->atasan_id;

        $cost = ['cost' => 10];
        $validate['password'] = password_hash('fanintek2022', PASSWORD_DEFAULT, $cost);
        if ($validate['posisi'] != 'direktur') {
            $validate['sisa_cuti'] = 12;
        }

        User::create($validate);
        return redirect('/admin/data-pegawai')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'ubah akun';
        $data = User::findOrFail($id);
        $get_atasan = User::whereNotIn('posisi', ['direktur'])->get();
        return view('admin.pegawai.edit', compact('title', 'data', 'get_atasan'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'posisi' => ['required'],
            'atasan_id' => ['nullable']
        ];
        if ($request->posisi == 'karyawan' || $request->posisi == 'atasan') {
            $rules['atasan_id'] = ['required', 'min:1'];
        }

        $validate = $request->validate($rules);

        $validate['atasan_id'] = (int)$request->atasan_id;

        $user->update($validate);
        return redirect('admin/data-pegawai')->with('success', 'Data pegawai berhasil diubah');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/data-pegawai')->with('delete', 'Data pegawai berhasil dihapus!');
    }
}
