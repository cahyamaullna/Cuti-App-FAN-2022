<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use App\Models\JenisCuti;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CutiController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $page = 10;
        $title = 'data cuti';
        $cuti = Cuti::where('user_id', $id)
            ->searchCuti(request('search'))
            ->latest()
            ->paginate($page);
        $passwordUser = auth()->user()->password;
        if (password_verify('fanintek2022', $passwordUser)) {
            $beep = 'beep';
        } else {
            $beep = '';
        }

        return view('datacuti.index', compact('title', 'cuti', 'beep'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    public function create()
    {
        $title = 'buat cuti';
        $jeniscuti = JenisCuti::all();
        $users = User::whereNotIn('posisi', ['direktur'])->get(['nama', 'id', 'npp']);
        return view('datacuti.create', compact('title', 'jeniscuti', 'users'));
    }

    public function store(Request $request)
    {
        // lanjut di approval
        $rule = [
            'user_id' => ['required'],
            'jenis_cuti' => ['required', 'min:1'],
            'sisa_cuti' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_akhir' => ['required'],
            'keterangan' => ['required', 'min:10', 'max:255'],
            'npp_pengganti' => ['required', 'numeric', 'min:1'],
            'nama_pengganti' => ['required'],
            'files' => ['required', 'file', 'mimes:jpg,png,jpeg,svg,pdf', 'max:2048'],
        ];

        $request->sisa_cuti = (int)substr($request->sisa_cuti, 0, 2) + 0;

        $tanggal_awal = new DateTime($request->tanggal_mulai);
        $tanggal_akhir = new DateTime($request->tanggal_akhir);
        $hasil = ($tanggal_awal->diff($tanggal_akhir)->days + 1);
        if ($request->jenis_cuti == "Tahunan") {
            if ($hasil > 12 || $hasil > $request->sisa_cuti) {
                $rule['sisa_cuti'] = ['required', 'lte:12', 'numeric'];
            }
        }

        $validate = $request->validate($rule);

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
        $validate['nomer_surat'] = $nomer;

        $validate['sisa_cuti'] = $request->sisa_cuti;
        $validate['total_hari'] = $hasil;
        $validate['updated_at'] = null;

        $namaFile = $request->file('files')->getClientOriginalName();
        $validate['files'] = $namaFile;

        $request->file('files')->storeAs('files', $namaFile);

        Cuti::create($validate);
        return redirect('/data/cuti')->with('success', 'Cuti berhasil diajukan');
    }

    public function jenisCuti($jeniscuti)
    {
        $data = JenisCuti::where('nama', $jeniscuti)->get();
        return response()->json($data);
    }

    public function sisaCuti($id)
    {
        $data = User::where('id', $id)->get();
        return response()->json($data);
    }

    public function ambilNpp($npp)
    {
        $data = User::where('npp', $npp)->get('nama');
        return response()->json($data);
    }
}
