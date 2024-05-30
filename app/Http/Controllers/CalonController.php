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

    public function edit($id)
    {

        $calon = Calon::find($id);
        return view('editcalon', ['calon' => $calon]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no' => 'required',
            'nama' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $calon = Calon::findOrFail($id);
        $calon->no = $request->input('no');
        $calon->nama = $request->input('nama');
        $calon->visi = $request->input('visi');
        $calon->misi = $request->input('misi');

        if ($request->hasFile('img')) {
            $uploadedImage = $request->file('img');
            $imageName = $uploadedImage->getClientOriginalName();
            $imagePath = $uploadedImage->storeAs('public/img', $imageName);
            $data['img'] = 'img/' . $imageName;
            $calon->img = $data['img']; 
        }

        $calon->save();

        return redirect()->route('calon')->with('success', 'Project Berhasil Diupdate !');
    }
    
    public function destroy($id)
    {
        Calon::destroy($id);

        return redirect(route('calon'))->with('success', 'Project Berhasil Dihapus !');
    }
}
