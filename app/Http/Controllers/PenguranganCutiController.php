<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PenguranganCuti;
use App\Http\Controllers\Controller;

class PenguranganCutiController extends Controller
{
    public function index()
    {
        $page = 10;
        $data = PenguranganCuti::latest()->paginate($page);
        $title = "pengurangan cuti";
        $passwordUser = auth()->user()->password;
        if (password_verify('fanintek2022', $passwordUser)) {
            $beep = 'beep';
        } else {
            $beep = '';
        }
        return view('penguranganCuti.index', compact('data', 'title', 'beep'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    public function create()
    {
        $title = 'tambah pengurangan cuti';
        $users = User::whereNotIn('posisi', ['direktur'])->get();
        return view('penguranganCuti.create', compact('title', 'users'));
    }

    public function store(Request $request)
    {
        $rule = [
            'nama' => ['required', 'min:1'],
            'pengurangan_cuti' => ['required', 'min:0', 'numeric'],
            'keterangan' => ['required', 'min:3', 'max:255']
        ];

        $sisa = (int)substr($request->sisa_cuti, 0, 2);
        if ($sisa == 0) {
            $rule['sisa_cuti'] = ['required', 'min:7', 'numeric'];
        }

        $validate = $request->validate($rule);
        $id = $request->id;
        $validate['pengurangan_cuti'] = (int)substr($request->pengurangan_cuti, 0, 2);
        $validate['sisa_cuti'] = $sisa - $validate['pengurangan_cuti'];
        $sisa_cuti = [
            'sisa_cuti' => $validate['sisa_cuti']
        ];

        User::where('id', $id)->update($sisa_cuti);
        PenguranganCuti::create($validate);

        return redirect('pengurangan-cuti')->with('success', 'Pengurangan cuti tersimpan');
    }

    public function ambilNama($nama)
    {
        $data = User::firstWhere('nama', $nama);
        return response()->json($data);
    }
}
