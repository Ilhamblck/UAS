<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id); 
        return view('guru.edit', compact('guru')); 
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nama_guru = $request->nama_guru; // Pastikan setiap atribut diupdate
        $guru->alamat = $request->alamat;
        $guru->no_hp = $request->no_hp;
        $guru->save(); // Simpan perubahan ke database

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru=guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian
        $guru = Guru::where('nama_guru', 'LIKE', '%' . $query . '%')->get(); // Cari berdasarkan nama guru
        return view('guru.index', compact('guru'))->with('success', 'Hasil pencarian untuk: ' . $query);
    }
}
