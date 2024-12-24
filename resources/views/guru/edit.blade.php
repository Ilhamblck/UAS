@extends('layout.master')

@section('content')
<div class="container">
    <h2 style="margin-top:10%;">Edit Guru</h2>
    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_guru">Nama Guru:</label>
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="no_hp">No. HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $guru->no_hp }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
