@extends('layout.master')

@section('content')
    <h1 class="text-center mb-4" style="margin-top:10%;">Daftar Hasil</h1>

    <!-- Form Pilihan Bulan dan Tahun -->
    <div class="mb-4">
        <form method="GET" action="{{ route('gurusummary.index') }}">
            <div class="row" style="margin-left:17%; margin-top:5%;">
                <div class="col-md-4">
                    <label for="bulan" class="form-label">Pilih Bulan</label>
                    <select name="bulan" id="bulan" class="form-select">
                        @foreach (['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'] as $key => $month)
                            <option value="{{ $key }}" {{ request('bulan', date('m')) == $key ? 'selected' : '' }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="tahun" class="form-label">Pilih Tahun</label>
                    <select name="tahun" id="tahun" class="form-select">
                        @foreach (range(date('Y'), 1900) as $year)
                            <option value="{{ $year }}" {{ request('tahun', date('Y')) == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
    

    <!-- Tabel untuk menampilkan data guru_summary -->
    <div class="table-responsive" style="margin:5%">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Murid</th>
                    <th>Total Absensi</th>
                    <th>Gaji</th>
                    <th>Hasil</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guruSummaries as $summary) 
                    <tr>
                        <td>{{ $summary->id }}</td>
                        <td>{{ $summary->guru->nama_guru }}</td>
                        <td>{{ $summary->mataPelajaran->nama_mata_pelajaran }}</td>
                        <td>{{ $summary->murid->nama_murid}}</td>
                        <td>{{ $summary->total_absensi }}</td>
                        <td>{{ number_format($summary->gaji, 0, ',', '.') }}</td>
                        <td>{{ number_format($summary->hasil, 0, ',', '.') }}</td>
                        <td>{{ $summary->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $summary->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@push('styles')
    <style>
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #343a40;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #d6e9f8;
        }

        .form-select {
            padding: 0.375rem 0.75rem;
        }
    </style>
@endpush
