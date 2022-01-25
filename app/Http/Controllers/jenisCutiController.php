<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use Illuminate\Http\Request;

class jenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisCuti::latest()->paginate(5);
        $title = 'jenis cuti';
        return view('admin.jenisCuti.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'buat data';
        return view('admin.jenisCuti.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'unique:jeniscuti', 'max:255'],
            'jumlah_hari' => ['required', 'numeric', 'min:0', 'max:255']
        ]);

        JenisCuti::create($request->all());
        return redirect('/admin/jenis-cuti')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisCuti = JenisCuti::where('id', $id)->first();
        $title = 'ubah data';
        return view('admin.jenisCuti.edit', compact('title', 'jenisCuti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisCuti $jenisCuti)
    {
        $rule = [
            'jumlah_hari' => ['required', 'numeric', 'min:0', 'max:255']
        ];

        if ($request->nama != $jenisCuti['nama']) {
            $rule['nama'] = ['required', 'unique:jeniscuti', 'max:255'];
        }
        $validate = $request->validate($rule);
        $jenisCuti->update($validate);
        return redirect('/admin/jenis-cuti')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisCuti::where('id', $id)->delete();
        return redirect('/admin/jenis-cuti')->with('delete', 'Data berhasil dihapus!');
    }
}
