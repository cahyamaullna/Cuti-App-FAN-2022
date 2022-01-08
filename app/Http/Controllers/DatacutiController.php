<?php

namespace App\Http\Controllers;

use App\Models\Datacuti;
use Illuminate\Http\Request;

class DatacutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Cuti';
        return view('datacuti.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Buat Cuti';
        return view('datacuti.create', compact('title'));
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
     * @param  \App\Models\Datacuti  $datacuti
     * @return \Illuminate\Http\Response
     */
    public function show(Datacuti $datacuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datacuti  $datacuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Datacuti $datacuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datacuti  $datacuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datacuti $datacuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datacuti  $datacuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datacuti $datacuti)
    {
        //
    }
}
