@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Daftar Murid</h1>
    <a href="{{ route('murid.create') }}" class="btn btn-primary mb-3">Tambah Murid</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($murid as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->nama_murid }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td>{{ $m->no_hp }}</td>
                    <td>
                        <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('murid.destroy', $m->id) }}" method="POST" style="display:inline-block;">
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
