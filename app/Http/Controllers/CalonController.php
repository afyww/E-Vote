<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    public function index()
    {
        $calon = Calon::all();

        return view('calon', compact('calon'));
    }

    public function create()
    {
        return view('addcalon');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no' => 'required',
            'nama' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $calon = new Calon();
        $calon->no = $validatedData['no'];
        $calon->nama = $validatedData['nama'];
        $calon->visi = $validatedData['visi'];
        $calon->misi = $validatedData['misi'];

        if ($request->hasFile('img')) {
            $uploadedImage = $request->file('img');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = $uploadedImage->storeAs('public/img', $imageName);
            $calon->img = 'img/' . $imageName;
        }

        $calon->save();

        return redirect()->route('calon')->with('success', 'Calon Berhasil Dibuat !');
    }

    public function edit(Calon $calon)
    {
        
        return view('editcalon');
    }

    public function update(Request $request, Calon $calon)
    {
        //
    }

    public function destroy(Calon $calon)
    {
        //
    }
}
