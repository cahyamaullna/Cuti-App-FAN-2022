<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
=======
<<<<<<< HEAD
use App\Models\Admin;
=======
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $data = User::where('is_admin', 0)->latest()->paginate(10);
        $title = 'data pegawai';
        return view('admin.pegawai.index', compact('title', 'data'));
=======
<<<<<<< HEAD
        $title = 'data akun';
        return view('admin.index', compact('title'));
=======
        //
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
    }

    public function create()
    {
<<<<<<< HEAD
        $title = 'buat data';
<<<<<<< HEAD
        return view('admin.pegawai.create', compact('title'));
=======
        return view('admin.create', compact('title'));
=======
        //
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'unique:users', 'email'],
            'npp' => ['required', 'min:5', 'numeric', 'unique:users'],
            'posisi' => ['required']
        ]);

        $cost = ['cost' => 10];
        $validate['password'] = password_hash('fanintek2022', PASSWORD_DEFAULT, $cost);

        User::create($validate);
        return redirect('/admin/data-pegawai')->with('success', 'Data berhasil disimpan!');
    }

<<<<<<< HEAD
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/data-pegawai')->with('delete', 'Data berhasil dihapus!');
=======
    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    {
        //
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
    }
}
