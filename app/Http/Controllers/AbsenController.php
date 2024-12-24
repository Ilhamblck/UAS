<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Guru;
use App\Models\murid;
use App\Models\MataPelajaran;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    // Menampilkan form untuk menambah data absen baru
    public function create()
    {
        $gurus = Guru::all();
        $murids = Murid::all();
        $mataPelajarans = MataPelajaran::all();
        return view('absen.create', compact('gurus', 'murids', 'mataPelajarans'));
    }

    // Menyimpan data absen
    public function store(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,id',
            'guru_id' => 'required|exists:guru,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'masuk' => 'required|boolean',
        ]);

        // Menyimpan data absen
        Absen::create([
            'murid_id' => $request->murid_id,
            'guru_id' => $request->guru_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'masuk' => $request->masuk, // Masuk (1) atau Tidak Masuk (0)
        ]);

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil ditambahkan');
    }

    // Menampilkan daftar absen
    public function index()
    {
        $absens = Absen::with(['guru', 'mataPelajaran','murid'])->get();
        return view('absen.index', compact('absens'));
    }

    // Menampilkan form untuk mengedit data absen
    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        $gurus = Guru::all();
        $murids = Murid::all();
        $mataPelajarans = MataPelajaran::all();
        return view('absen.edit', compact('absen', 'gurus', 'murids','mataPelajarans'));
    }

    // Memperbarui data absen
    public function update(Request $request, $id)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,id',
            'guru_id' => 'required|exists:guru,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i:s',
            'masuk' => 'required|boolean',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->update($request->all());
        return redirect()->route('absen.index')->with('success', 'Data absen berhasil diperbarui');
    }

    // Menghapus data absen
    public function destroy($id)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();
        return redirect()->route('absen.index')->with('success', 'Data absen berhasil dihapus');
    }

    public function destroyAll()
{
    try {
        // Hapus semua data dari tabel absensi
        Absen::truncate();

        // Redirect kembali ke halaman absensi dengan pesan sukses
        return redirect()->route('absen.index')->with('success', 'Semua data absensi berhasil dihapus.');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, redirect dengan pesan error
        return redirect()->route('absen.index')->with('error', 'Gagal menghapus data absensi: ' . $e->getMessage());
    }
}

}
