@extends('dashboard.layouts.main')

@section('css')
<link rel="stylesheet" href="/css/dashboard.css" />
@endsection

@section('main')
<main class="position-relative">
  <section class="container-fluid px-0">
    <h2 class="fs-5 py-3 mb-0 ms-3">Dashboard</h2>
    <div class="border-bottom"></div>
    <div class="row m-0" id="cards">
      <div class="col-md-4" style="margin-top: .8em">
        <div class="border rounded-3 p-3 container-card">
          <a href="/dashboard/siswa" class="badge text-dark text-decoration-none card-link">
            VIEW MORE
          </a>
          <div class="card-hover"></div>
          <p class="text-muted fs-7 fw-bold mb-2">Total siswa</p>
          <strong class="fs-5">{{ $jumlahSiswa }}</strong>
        </div>
      </div>
      <div class="col-md-4" style="margin-top: .8em">
        <div class="border rounded-3 p-3 container-card">
          <a href="/dashboard/kelas" class="badge text-dark text-decoration-none card-link">
            VIEW MORE
          </a>
          <div class="card-hover"></div>
          <p class="text-muted fs-7 fw-bold mb-2">Total kelas</p>
          <strong class="fs-5">{{ $jumlahKelas }}</strong>
        </div>
      </div>
      <div class="col-md-4" style="margin-top: .8em">
        <div class="border rounded-3 p-3 container-card">
          <a href="/dashboard/jurusan" class="badge text-dark text-decoration-none card-link">
            VIEW MORE
          </a>
          <div class="card-hover"></div>
          <p class="text-muted fs-7 fw-bold mb-2">Total jurusan</p>
          <strong class="fs-5">{{ $jumlahJurusan }}</strong>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection