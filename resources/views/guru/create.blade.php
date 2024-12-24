@extends('layout.master')

@section('content')
<div class="container">
    <h2 style="margin-top:10%;">Tambah Guru</h2>
    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_guru">Nama Guru:</label>
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukkan Nama Guru" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
        </div>

        <div class="form-group">
            <label for="no_hp">No. HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
