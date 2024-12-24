@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Daftar Absen</h1>
    <a href="{{ route('absen.create') }}" class="btn btn-primary">Tambah Absen</a>
    <form action="{{ route('absen.destroyAll') }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">Hapus Semua</button>
</form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Murid</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absens as $absen)
                <tr>
                    <td>{{ $absen->id }}</td>
                    <td>{{ $absen->guru->nama_guru }}</td>
                    <td>{{ $absen->mataPelajaran->nama_mata_pelajaran }}</td>
                    <td>{{ $absen->murid->nama_murid}}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->jam}}</td>
                    <td>{{ $absen->masuk ? 'Masuk' : 'Tidak Masuk' }}</td>
                    <td>
                        <a href="{{ route('absen.edit', $absen->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('absen.destroy', $absen->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
