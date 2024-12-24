@extends('layout.master')
@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Edit Mata Pelajaran</h1>
    <form action="{{ route('mata_pelajaran.update', $mataPelajaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_mata_pelajaran">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mata_pelajaran" id="nama_mata_pelajaran" class="form-control" value="{{ $mataPelajaran->nama_mata_pelajaran }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
</div>
@endsection
