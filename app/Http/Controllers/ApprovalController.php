<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function index()
    {
        $page = 20;
        $joindata = Cuti::join('users', 'cuti.user_id', '=', 'users.id')
            ->searchApproval(request('search'))
            ->orderBy('updated_at', 'asc');

        if (auth()->user()->posisi == "atasan") {
            $data = $joindata->where('users.atasan_id', auth()->user()->id)
                ->paginate($page, ['users.posisi', 'users.nama', 'cuti.*']);
        } elseif (auth()->user()->posisi == "hrd") {
            $data = $joindata->where('users.atasan_id', auth()->user()->id)
                ->orWhere('posisi', 'karyawan')
                ->paginate($page, ['users.posisi', 'users.nama', 'cuti.*']);
        } elseif (auth()->user()->posisi == "direktur") {
            $data = $joindata->whereIn('posisi', ['karyawan', 'atasan', 'hrd'])
                ->paginate($page, ['users.posisi', 'users.nama', 'cuti.*']);
        }

        $title = 'approval';
        $passwordUser = auth()->user()->password;
        if (password_verify('fanintek2022', $passwordUser)) {
            $beep = 'beep';
        } else {
            $beep = '';
        }
        return view('approval.index', compact('title', 'data', 'beep'))
            ->with('i', (Request()->input('page', 1) - 1) * $page);
    }

    public function detail($id)
    {
        $title = 'detail';
        $data = Cuti::findOrFail($id);
        return view('approval.detail', compact('data', 'title'));
    }

    public function update(Request $request, $id)
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

        // join data
        $joindata = Cuti::join('users', 'cuti.user_id', '=', 'users.id')
            ->get(['users.posisi']);

        if ($joindata->where('id', $id)->where('posisi', 'karyawan')) {
            if ($request->jenis_cuti == 'Tahunan' && $request->atasan == 2 && $request->hrd == 2 && $request->direktur == 2) {
                $sisa = (int)$request->sisa_cuti - (int)$request->total_hari;

                // sisa cuti user
                $sisa_cuti = [
                    'sisa_cuti' => $sisa
                ];

                $user_id = $request->user_id;
                User::where('id', $user_id)->update($sisa_cuti);
            }
        }

        if ($joindata->where('id', $id)->where('posisi', 'atasan')) {
            if ($request->jenis_cuti == 'Tahunan' && $request->hrd == 2 && $request->direktur == 2) {
                $sisa = (int)$request->sisa_cuti - (int)$request->total_hari;

                // sisa cuti user
                $sisa_cuti = [
                    'sisa_cuti' => $sisa
                ];

                $user_id = $request->user_id;
                User::where('id', $user_id)->update($sisa_cuti);
            }
        }

        if ($joindata->where('id', $id)->where('posisi', 'hrd')) {
            if ($request->jenis_cuti == 'Tahunan' && $request->direktur == 2) {
                $sisa = (int)$request->sisa_cuti - (int)$request->total_hari;

                // sisa cuti user
                $sisa_cuti = [
                    'sisa_cuti' => $sisa
                ];

                $user_id = $request->user_id;
                User::where('id', $user_id)->update($sisa_cuti);
            }
        }

        Cuti::where('id', $id)->update($validate);
        return redirect('/data/approval')->with('success', 'Data Tersimpan');
    }

    public function download($id)
    {
        $file = Cuti::where('id', $id)->first();
        $path = public_path('storage/files/' . $file->files);
        return response()->download($path);
    }
}
