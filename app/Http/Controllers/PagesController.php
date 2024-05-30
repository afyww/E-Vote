<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Suara;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {

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

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        // CALON SEARCH
        $calonResults = Calon::where('nama', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('visi', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('misi', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        // PEMILIH SEARCH
        $pemilihResults = User::where('name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        // SUARA SEARCH
        $suaraResults = Suara::whereHas('user', function ($query) use ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('email', 'LIKE', '%' . $searchQuery . '%');
        })
            ->orWhereHas('calon', function ($query) use ($searchQuery) {
                $query->where('nama', 'LIKE', '%' . $searchQuery . '%');
            })
            ->get();

        return view('search', compact('calonResults', 'pemilihResults', 'suaraResults'));
    }

    public function dashboarduser()
    {

        return view('dashboarduser');
    }

    public function profil()
    {

        return view('profil');
    }

    public function user()
    {

        return view('user');
    }
}
