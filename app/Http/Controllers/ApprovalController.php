<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        $title = 'Approval';
        return view('approval.index', compact('title'));
    }

    public function show ()
    { 
        $title = 'Detail';
        return view('approval.detail', compact('title'));
    }


}
