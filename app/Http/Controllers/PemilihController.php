<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function index()
    {

        $user = User::all();

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
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|string|in:admin,pemilih',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->level = $validatedData['level'];
        $user->save();

        return redirect(route('pemilih'))->with('success', 'Pemilih Berhasil Dibuat !');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('pemilih'))->with('success', 'User Berhasil Dihapus !');
    }
}
