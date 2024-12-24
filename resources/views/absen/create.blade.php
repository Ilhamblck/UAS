@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Tambah Absensi</h1>
    <form action="{{ route('absen.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="murid_id" class="form-label">Nama Murid</label>
            <select name="murid_id" id="murid_id" class="form-control" required>
                @foreach($murids as $murid)
                    <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="guru_id" class="form-label">Nama Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control" required>
                @foreach($mataPelajarans as $mataPelajaran)
                    <option value="{{ $mataPelajaran->id }}">{{ $mataPelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" value="{{ old('jam', $absen->jam ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan Kehadiran: </label><br>
            <input type="radio" name="masuk" value="1" required> Masuk
            <input type="radio" name="masuk" value="0" required> Tidak Masuk
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
