<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    // Menampilkan daftar murid
    public function index()
    {
        $murid = Murid::all();
        return view('murid.index', compact('murid'));
    }

    // Menampilkan form untuk menambah data murid baru
    public function create()
    {
        return view('murid.create');
    }

    // Menyimpan data murid baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_murid' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        Murid::create($request->all());
        return redirect()->route('murid.index')->with('success', 'Data murid berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data murid
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    // Memperbarui data murid
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_murid' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $murid = Murid::findOrFail($id);
        $murid->update($request->all());
        return redirect()->route('murid.index')->with('success', 'Data murid berhasil diperbarui');
    }

    // Menghapus data murid
    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();
        return redirect()->route('murid.index')->with('success', 'Data murid berhasil dihapus');
    }
}
