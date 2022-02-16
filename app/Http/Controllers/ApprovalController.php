<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $page = 10;
        $data = Cuti::latest()->paginate($page);
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
            'hrd' => 'nullable'
        ]);
        $validate['hrd'] = (int)$request->hrd;
        // dd($validate['hrd']);
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
