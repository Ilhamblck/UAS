<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruSummary;
use App\Models\Guru;
use App\Models\Absen;
use App\Models\murid;
use App\Models\MataPelajaran;
use Carbon\Carbon;

class MasterOfMaster extends Controller
{
    public function index(Request $request)
{

        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
    
        $guruSummaries = GuruSummary::query()
            ->when($bulan && $tahun, function ($query) use ($bulan, $tahun) {
                $query->whereRaw('MONTH(created_at) = ? AND YEAR(created_at) = ?', [$bulan, $tahun]);
            })
            ->get();

        return view('Utama.gabungan', compact('guruSummaries'));
    }
}