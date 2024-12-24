@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Daftar Gaji</h1>
    <a href="{{ route('gaji.create') }}" class="btn btn-primary mb-3">Tambah Gaji</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guru</th>
                <th>Gaji setiap pertemuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gajis as $gaji)
                <tr>
                    <td>{{ $gaji->id }}</td>
                    <td>{{ $gaji->guru->nama_guru }}</td>
                    <td>{{ $gaji->jumlah_gaji }}</td>
                    <td>
                        <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
