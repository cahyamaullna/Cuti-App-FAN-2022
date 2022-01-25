<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $cuties = Cuti::where('user_id', $id)->paginate(5);
        $title = 'data cuti';
        return view('datacuti.index', compact('title', 'cuties'));
    }

    public function create()
    {
        $title = 'buat cuti';
        $jeniscuties = JenisCuti::all();

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
        return view('datacuti.create', compact('title', 'jeniscuties', 'nomer'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nomer_surat' => ['required'],
            'jeniscuti_id' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_akhir' => ['required'],
            'keterangan' => ['required', 'min:10', 'max:255'],
            'npp_pengganti' => ['required', 'numeric', 'min:5'],
            'nama_pengganti' => ['required', 'min:5'],
            'upload_bukti' => ['required', 'image', 'file', 'max:2048']
        ]);

        // id yang sedang login
        $validate['user_id'] = auth()->user()->id;

        // path gambar
        $validate['upload_bukti'] = $request->file('upload_bukti')->store('foto_bukti');


        // sisa cuti
        // if ($request->jenis_cuti == 'cuti tahunan') {
        //     
        // }

        Cuti::create($validate);
        return redirect('/data/cuti')->with('success', 'Ajukan cuti sudah dibuat!');
    }
}
