@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Tambah Gaji</h1>
    <form action="{{ route('gaji.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_gaji" class="form-label">Jumlah Gaji</label>
            <input type="number" name="jumlah_gaji" id="jumlah_gaji" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
