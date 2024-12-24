@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Tambah Murid</h1>
    <form action="{{ route('murid.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_murid" class="form-label">Nama Murid</label>
            <input type="text" name="nama_murid" id="nama_murid" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
