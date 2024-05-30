<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Suara;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){

        //TOTAL CALON
        $total_calon = Calon::count();

        //TOTAL PROJECT
        $total_pemilih = User::count();

        //TOTAL SUARA
        $total_suara = Suara::count();

        return view('dashboard', [
            'total_calon' => $total_calon,
            'total_pemilih' => $total_pemilih,
            'total_suara' => $total_suara,
        ]);    
    }

    public function dashboarduser(){

        return view('dashboarduser');
    }

    public function user(){

        return view('user');
    }
}
