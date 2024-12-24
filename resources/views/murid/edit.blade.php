@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Edit Murid</h1>
    <form action="{{ route('murid.update', $murid->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_murid" class="form-label">Nama</label>
            <input type="text" name="nama_murid" id="nama_murid" class="form-control" value="{{ $murid->nama_murid }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $murid->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $murid->no_hp }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
