<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $page = 10;
        $joindata = Cuti::join('users', 'cuti.user_id', '=', 'users.id')
            ->get(['users.posisi', 'users.nama', 'cuti.*']);
        if (auth()->user()->posisi == "atasan") {
            $data = $joindata->where('posisi', 'karyawan');
        } elseif (auth()->user()->posisi == "hrd") {
            $data = $joindata->whereIn('posisi', ['karyawan', 'atasan']);
        } elseif (auth()->user()->posisi == "direktur") {
            $data = $joindata->whereIn('posisi', ['karyawan', 'atasan', 'hrd']);
        }
        $title = 'approval';
        $passwordUser = auth()->user()->password;
        if (password_verify('fanintek2022', $passwordUser)) {
            $beep = 'beep';
        } else {
            $beep = '';
        }
        return view('approval.index', compact('title', 'data', 'beep'))
            ->with('i', ($request->input('page', 1) - 1) * $page);
    }

    public function edit($id)
    {
        $title = 'detail';
        $data = Cuti::findOrFail($id);
        return view('approval.edit', compact('data', 'title'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $validate = $request->validate([
            'atasan' => 'nullable|numeric',
            'hrd' => 'nullable|numeric',
            'direktur' => 'nullable|numeric'
        ]);
        if ($request->atasan) {
            $validate['atasan'] = (int)$request->atasan;
        } elseif ($request->hrd) {
            $validate['hrd'] = (int)$request->hrd;
        } elseif ($request->direktur) {
            $validate['direktur'] = (int)$request->direktur;
        }
        $cuti->update($validate);
        return redirect('/data/approval')->with('success', 'Tersimpan');
    }

    public function download($id)
    {
        $file = Cuti::where('id', $id)->first();
        $path = public_path('storage/files/' . $file->files);
        return response()->download($path);
    }
}
