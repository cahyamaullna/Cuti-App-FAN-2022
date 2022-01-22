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
        $title = 'dashboard';
        $karyawan = User::where('posisi', 'karyawan');
        $atasan = User::where('posisi', 'atasan');
        $hrd = User::where('posisi', 'hrd');
        $direktur = User::where('posisi', 'direktur');
        return view('dashboard.index', compact('title', 'karyawan', 'atasan', 'hrd', 'direktur'));
    }
}
