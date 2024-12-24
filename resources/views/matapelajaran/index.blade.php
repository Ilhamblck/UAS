@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Mata Pelajaran</h1>
    <a href="{{ route('mata_pelajaran.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mataPelajarans as $mata) <!-- Pastikan nama variabel sesuai dengan yang dikirim dari controller -->
            <tr>
                <td>{{ $mata->id }}</td>
                <td>{{ $mata->nama_mata_pelajaran }}</td>
                <td>
                    <a href="{{ route('mata_pelajaran.edit', $mata->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mata_pelajaran.destroy', $mata->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $mata->id }}">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
