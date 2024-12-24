@extends('layout.master')

@section('content')
<div class="container">
    <h1 style="margin-top:10%;">Edit Gaji</h1>
    <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ $guru->id == $gaji->guru_id ? 'selected' : '' }}>
                        {{ $guru->nama_guru }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_gaji" class="form-label">Jumlah Gaji</label>
            <input type="number" name="jumlah_gaji" id="jumlah_gaji" class="form-control" value="{{ $gaji->jumlah_gaji }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
