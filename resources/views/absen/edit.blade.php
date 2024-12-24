@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Edit Absen</h1>
    <form action="{{ route('absen.update', $absen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="murid_id" class="form-label">Murid</label>
            <select name="murid_id" id="murid_id" class="form-control" required>
                <option value="">Pilih Murid</option>
                @foreach($murids as $murid)
                    <option value="{{ $murid->id }}" {{ $murid->id == $absen->murid_id ? 'selected' : '' }}>
                        {{ $murid->nama_murid }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
                <option value="">Pilih Guru</option>
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ $guru->id == $absen->guru_id ? 'selected' : '' }}>
                        {{ $guru->nama_guru }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control" required>
                <option value="">Pilih Mata Pelajaran</option>
                @foreach($mataPelajarans as $mata)
                    <option value="{{ $mata->id }}" {{ $mata->id == $absen->mata_pelajaran_id ? 'selected' : '' }}>
                        {{ $mata->nama_mata_pelajaran }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $absen->tanggal }}" required>
        </div>

        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" value="{{ old('jam', $absen->jam ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="masuk" class="form-label">Masuk</label>
            <select name="masuk" id="masuk" class="form-control" required>
                <option value="1" {{ $absen->masuk == 1 ? 'selected' : '' }}>Masuk</option>
                <option value="0" {{ $absen->masuk == 0 ? 'selected' : '' }}>Tidak Masuk</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
