<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\JenisCuti;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $cuti = Cuti::where('user_id', $id)->get();
        $title = 'data cuti';
        $passwordUser = auth()->user()->password;
        if (password_verify('fanintek2022', $passwordUser)) {
            $beep = 'beep';
        } else {
            $beep = '';
        }
        return view('datacuti.index', compact('title', 'cuti', 'beep'));
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
        $rule = [
            'user_id' => ['required'],
            'nomer_surat' => ['required'],
            'jenis_cuti' => ['required', 'min:1'],
            'sisa_cuti' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_akhir' => ['required'],
            'keterangan' => ['required', 'min:10', 'max:255'],
            'npp_pengganti' => ['required', 'numeric', 'min:5'],
            'nama_pengganti' => ['required', 'min:5'],
            'files' => ['required', 'file', 'mimes:jpg,png,jpeg,svg,pdf', 'max:2048']
        ];

        $request->sisa_cuti = (int)substr($request->sisa_cuti, 0, 2) + 0;

        $tanggal_awal = new DateTime($request->tanggal_mulai);
        $tanggal_akhir = new DateTime($request->tanggal_akhir);
        $hasil = ($tanggal_awal->diff($tanggal_akhir)->days + 1);
        if ($request->jenis_cuti == "Tahunan") {
            $rule['sisa_cuti'] = ['required', 'gte:0'];
        }

        $validate = $request->validate($rule);

        if ($request->jenis_cuti == "Tahunan") {
            $validate['sisa_cuti'] = $request->sisa_cuti - $hasil;
        }

        $validate['sisa_cuti'] = $request->sisa_cuti;
        $validate['total_hari'] = $hasil;

        $namaFile = $request->file('files')->getClientOriginalName();
        $validate['files'] = $namaFile;

        $request->file('files')->storeAs('files', $namaFile);

        Cuti::create($validate);
        return redirect('/data/cuti')->with('success', 'Cuti berhasil diajukan');
    }

    public function jeniscuti($jeniscuti)
    {
        $data = JenisCuti::where('nama', $jeniscuti)->get();
        return response()->json($data);
    }

    public function sisacuti($user_id)
    {
        $data = Cuti::where('user_id', $user_id)->latest()->get('sisa_cuti');
        return response()->json($data);
    }

    public function penguranganCuti()
    {
        $page = 10;
        $data = Cuti::where('jenis_cuti', 'Tahunan')->latest()->paginate($page);
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
}
