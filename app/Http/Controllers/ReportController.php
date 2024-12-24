<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Facade;

class ReportController extends Controller
{
public function detail($guru_id)
    {
        // Ambil data detail dari tabel guru_summary berdasarkan guru_id
        $details = FacadesDB::table('guru_summary')
            ->join('mata_pelajaran', 'guru_summary.mata_pelajaran_id', '=', 'mata_pelajaran.id')
            ->join('murid', 'guru_summary.murid_id', '=', 'murid.id')
            ->select('guru_summary.*', 'mata_pelajaran.nama_mata_pelajaran', 'murid.nama_murid')
            ->where('guru_summary.guru_id', $guru_id)
            ->get();

        // Ambil informasi guru
        $guru = FacadesDB::table('guru')->where('id', $guru_id)->first();

        return view('report.detail', compact('details', 'guru'));
    }


    public function filter(Request $request)
{
    $namaGuru = $request->input('nama_guru'); // Filter nama guru
    $bulan = $request->input('bulan'); // Filter bulan (01-12)

    // Query untuk mengambil data report
    $reports = FacadesDB::table('guru as g')
        ->leftJoin('absensi as a', 'g.id', '=', 'a.guru_id')
        ->leftJoin('guru_summary as gs', function ($join) {
            $join->on('g.id', '=', 'gs.guru_id')
                ->on('gs.mata_pelajaran_id', '=', 'a.mata_pelajaran_id')
                ->whereRaw('YEAR(gs.created_at) = YEAR(a.tanggal)') 
                ->whereRaw('MONTH(gs.created_at) = MONTH(a.tanggal)');  
        })
        ->select(
            'g.id AS guru_id',
            'g.nama_guru',
            FacadesDB::raw('COUNT(DISTINCT a.id) AS total_absensi'),
            FacadesDB::raw('COALESCE(SUM(gs.hasil), 0) AS total_gaji'),
            FacadesDB::raw('MONTH(a.tanggal) AS bulan')
        )
        ->when($namaGuru, function ($query, $namaGuru) {
            return $query->where('g.nama_guru', 'LIKE', "%{$namaGuru}%");  
        })
        ->when($bulan, function ($query, $bulan) {
            return $query->whereMonth('a.tanggal', $bulan); 
        })
        ->groupBy('g.id', 'g.nama_guru', FacadesDB::raw('MONTH(a.tanggal)'))
        ->orderBy(FacadesDB::raw('MONTH(a.tanggal)'), 'ASC')
        ->get();



    // Validasi input
    $request->validate([
        'nama_guru' => 'nullable|string|max:255',
        'bulan' => 'nullable|digits:2|between:01,12',
    ]);

    return view('report.index', compact('reports'));
}

}
