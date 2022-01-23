<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $title = 'dashboard';
        $karyawan = User::where('posisi', 'karyawan');
        $atasan = User::where('posisi', 'atasan');
        $hrd = User::where('posisi', 'hrd');
        $direktur = User::where('posisi', 'direktur');
        return view('dashboard.index', compact('title', 'karyawan', 'atasan', 'hrd', 'direktur'));
=======
<<<<<<< HEAD
        $title = 'Dashboard';
        return view('dashboard.index', compact('title'));
=======
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
    }
}
