<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\guru;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $gajis = gaji::all();
        return view('gaji.index', compact('gajis'));
    }

    public function create()
    {
        $gurus = guru::all();
        return view('gaji.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'jumlah_gaji' => 'required',
        ]);

        Gaji::create($request->all());

        return redirect()->route('gaji.index');
    }

    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gurus = Guru::all(); // Ambil semua data guru untuk dropdown
        return view('gaji.edit', compact('gaji', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_id' => 'required',
            'jumlah_gaji' => 'required',
        ]);
        $gaji = gaji::findOrFail($id);
        $gaji->update($request->all());

        return redirect()->route('gaji.index');
    }

    public function destroy($id)
    {
        $gajis=gaji::findOrFail($id);
        $gajis->delete();

        return redirect()->route('gaji.index');
    }
}
