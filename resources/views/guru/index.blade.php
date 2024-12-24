@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Daftar Guru</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('guru.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Cari nama guru..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    <!-- Tabel Daftar Guru -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($guru as $gurus)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gurus->nama_guru }}</td>
                    <td>{{ $gurus->alamat }}</td>
                    <td>{{ $gurus->no_hp }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $gurus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('guru.destroy', $gurus->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data guru ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
