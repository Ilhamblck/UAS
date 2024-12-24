@extends('layout.master')

@section('content')
    <style>
        body {
            background: url('{{ asset("images/background1.jpg") }}') no-repeat center;
            background-size:cover ;
            height: 100vh; /* Menjamin bahwa halaman memenuhi seluruh tinggi viewport */
            margin: 0; /* Menghilangkan margin default */
        }

        a.btn {
            transition: background-color 1s ease, transform 1s ease;
            border: 5px blue solid;
        }

        a.btn:hover {
            transform: scale(1.25); /* Membuat tombol sedikit membesar */
        }


        a.btn-dark:hover {
            background-color: violet; 
            color: purple;
            
        }

        a.btn-danger:hover {
            background-color: blue; 
            color: greenyellow;
        }
        


    </style>
<div class="container mt-5">
    <div class="row justify-content-end" style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 10%;">
        <div class="col-md-2 mb-3" style="margin-top: 5%;">
            <a href="{{ route('gurusummary.index') }}" class="btn btn-danger btn-lg w-100 text-uppercase font-weight-bold">Guru Summary</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('report.filter') }}" class="btn btn-danger btn-lg w-100 text-uppercase font-weight-bold">Report Hall</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('guru.index') }}" class="btn btn-dark btn-lg w-100 text-uppercase font-weight-bold">Guru</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('murid.index') }}" class="btn btn-dark btn-lg w-100 text-uppercase font-weight-bold">Murid</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('absen.index') }}" class="btn btn-dark btn-lg w-100 text-uppercase font-weight-bold">Absen</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('gaji.index') }}" class="btn btn-dark btn-lg w-100 text-uppercase font-weight-bold">Gaji</a>
        </div>
        <div class="col-md-2 mb-3">
            <a href="{{ route('mata_pelajaran.index') }}" class="btn btn-dark btn-lg w-100 text-uppercase font-weight-bold">Mata Pelajaran</a>
        </div>
        <div class="a">

        </div>
    </div>
</div>
@endsection
