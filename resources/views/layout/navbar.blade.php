<!-- resources/views/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-lg bg-dark text-white" id="mainNavbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}" style="color: white; background-color: cornflowerblue; padding: 8px; border: 2px solid white; border-radius: 5px;">
      Data Guru
    </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-color: lightblue; border-radius: 5px;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}" style="color: white;">Home</a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="{{ route('gurusummary.index') }}" style="color: white;">Gabungan data</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('absen.index') }}" style="color: white;">Absen</a>
        </li>



        <li class="nav-item">
          <a class="nav-link" href="{{ route('report.filter') }}" style="color: white;">Laporan Gabungan</a>
        </li>


        <li class="nav-item dropdown" style="margin-right: 50px;">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Pilihan Lain
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('murid.index') }}">Data Murid</a></li>
            <li><a class="dropdown-item" href="{{ route('mata_pelajaran.index') }}">Mata Pelajaran</a></li>
            <li><a class="dropdown-item" href="{{ route('gurusummary.index') }}">Hasil Guru Summary</a></li>
            <li><a class="dropdown-item" href="{{ route('gaji.index') }}">Data Gaji</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Tambahkan CSS untuk navbar -->
<style>
  #mainNavbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1030;
  }

  .navbar-nav .nav-link {
    color: white; 
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link:focus {
    background-color: blue; /* Latar belakang biru saat hover atau fokus */
    color: white; /* Teks tetap putih saat hover */
  }
</style>
