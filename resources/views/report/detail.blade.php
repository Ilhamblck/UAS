@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%; text-align:center;">Detail Report</h1>
    <h3 style="margin-top:2%;">Nama Guru: {{ $guru->nama_guru }}</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Nama Murid</th>
                <th>Total Absensi</th>
                <th>Gaji</th>
                <th>Hasil</th>
            </tr>
      </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{ $detail->nama_mata_pelajaran }}</td>
                <td>{{ $detail->nama_murid }}</td>
                <td>{{ $detail->total_absensi }}</td>
                <td>{{ number_format($detail->gaji, 0, ',', '.') }}</td>
                <td>{{ number_format($detail->hasil, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
