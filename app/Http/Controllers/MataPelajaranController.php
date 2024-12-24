<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran; // Nama model harus sesuai dengan nama file
use App\Models\Guru;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller // Nama controller dengan huruf kapital
{
    // Menampilkan daftar mata pelajaran
    public function index()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('matapelajaran.index', compact('mataPelajarans'));
    }

    // Menampilkan form untuk membuat mata pelajaran baru
    public function create()
    {
        $gurus = Guru::all();
        return view('matapelajaran.create', compact('gurus'));
    }

    // Menyimpan data mata pelajaran baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_mata_pelajaran' => 'required|string|max:255',
        ]);

        MataPelajaran::create($request->all());
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit mata pelajaran
    public function edit($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $gurus = Guru::all();
        return view('matapelajaran.edit', compact('mataPelajaran', 'gurus'));
    }

    // Memperbarui data mata pelajaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mata_pelajaran' => 'required|string|max:255',
        ]);

        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->update($request->all());
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil diperbarui');
    }

    // Menghapus data mata pelajaran
    public function destroy(Request $request)
{
    $request->validate([
        'id' => 'required|exists:mata_pelajaran,id',
    ]);

    $mataPelajaran = MataPelajaran::findOrFail($request->id);
    $mataPelajaran->delete();

    return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran berhasil dihapus');
}

}
