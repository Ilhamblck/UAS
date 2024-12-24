@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Tambah Mata Pelajaran</h1>
    <form action="{{ route('mata_pelajaran.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_mata_pelajaran">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mata_pelajaran" id="nama_mata_pelajaran" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
