<?php

namespace App\Http\Controllers;

use App\Models\Calon;
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
        $request->validate([
            'calon_id' => 'required|exists:calons,id',
        ]);

        $userId = auth()->user()->id;

        $existingVote = Suara::where('user_id', $userId)->first();

        if ($existingVote) {
            return redirect()->route('result');
        }

        // Proceed with storing the vote
        Suara::create([
            'user_id' => $userId,
            'calon_id' => $request->calon_id,
        ]);

        return redirect()->route('result');
    }
}
