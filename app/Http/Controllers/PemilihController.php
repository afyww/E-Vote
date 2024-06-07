<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function index()
    {

        $user = User::where('level', 'pemilih')->get();

        return view('pemilih', compact('user'));
    }

    public function create()
    {
        return view('addpemilih');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'nik' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->nik = $validatedData['nik'];
        $user->password = bcrypt($validatedData['password']);
        $user->level = 'pemilih';
        $user->save();

        return redirect(route('pemilih'))->with('success', 'Pemilih Berhasil Dibuat !');
    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('pemilih'))->with('success', 'User Berhasil Dihapus !');
    }
}
