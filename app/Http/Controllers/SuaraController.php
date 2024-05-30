<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    public function index()
    {
        $suara = Suara::with(['user', 'calon'])->get();

        return view('suara', compact('suara'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


}
