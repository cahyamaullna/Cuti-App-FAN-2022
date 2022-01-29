<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $pagination = 10;
        $cuti = Cuti::where('user_id', $id)->paginate($pagination);
        $title = 'data cuti';
        return view('datacuti.index', compact('title', 'cuti'))
            ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        $title = 'buat cuti';
        $jeniscuti = JenisCuti::all();

        // nomer surat (001/Cuti-FAN/1/2022)
        $now = Carbon::now();
        $bulan = $now->month;
        $tahun = $now->year;
        $cek = Cuti::count();

        if ($cek == 0) {
            $urut = '001';
            $nomer = $urut . '/Cuti-FAN/' . $bulan . '/' . $tahun;
        } else {
            $ambil = Cuti::all()->last();
            $urut = (int)substr($ambil->nomer_surat, 2) + 1;
            $nomer = '00' . $urut . '/Cuti-FAN/' . $bulan . '/' . $tahun;
        }
        return view('datacuti.create', compact('title', 'jeniscuti', 'nomer'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nomer_surat' => ['required'],
            'jeniscuti_id' => ['required', 'min:1'],
            'sisa_cuti' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_akhir' => ['required'],
            'keterangan' => ['required', 'min:10', 'max:255'],
            'npp_pengganti' => ['required', 'numeric', 'min:5'],
            'nama_pengganti' => ['required', 'min:5'],
            'foto_bukti' => ['required', 'image', 'file', 'max:2048']
        ]);

        // id yang sedang login
        $validate['user_id'] = auth()->user()->id;

        // path gambar
        $validate['foto_bukti'] = $request->file('foto_bukti')->store('foto_bukti');


        // sisa cuti
        // if ($request->jenis_cuti == 'cuti tahunan') {
        //     
        // }

        // sisa cuti
        $validate['sisa_cuti'] = substr($request->sisa_cuti, 0, 2);

        Cuti::create($validate);
        return redirect('/data/cuti')->with('success', 'Ajukan cuti sudah dibuat!');
    }

    public function jeniscuti($jeniscuti)
    {
        $data = JenisCuti::where('id', $jeniscuti)->get();
        return response()->json($data);
    }

    public function sisacuti($user_id)
    {
        $data = Cuti::where('user_id', $user_id)->get('sisa_cuti');
        return response()->json($data);
    }
}
