<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Admin;
=======
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $title = 'data akun';
        return view('admin.index', compact('title'));
=======
        //
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $title = 'buat data';
        return view('admin.create', compact('title'));
=======
        //
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
    }
}
