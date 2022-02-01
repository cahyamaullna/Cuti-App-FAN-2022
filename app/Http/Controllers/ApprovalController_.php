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
        return view('approval.index', compact('title', 'data'))
            ->with('i', ($request->input('page', 1) - 1) * $page);
    }

    public function show($id)
    {
        $data = Cuti::where('id', $id)->get();
        $title = 'detail';
        return view('approval.detail', compact('title', 'data'));
    }
}
