@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Report</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('report.filter') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="{{ request('nama_guru') }}">
            </div>
            <div class="col-md-4">
                <label for="bulan" class="form-label">Bulan</label>
                <select name="bulan" id="bulan" class="form-select">
                    @foreach (['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'] as $key => $month)
                        <option value="{{ $key }}" {{ request('bulan') == $key ? 'selected' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>


    <!-- Tabel Report -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Bulan</th>
                <th>Jumlah Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->nama_guru }}</td>
                <td>{{ \Carbon\Carbon::create()->month($report->bulan)->translatedFormat('F') }}</td>
                <td>{{ number_format($report->total_gaji, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('report.detail', $report->guru_id) }}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
