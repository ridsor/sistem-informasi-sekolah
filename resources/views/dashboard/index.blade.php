@extends('dashboard.layouts.main')

@section('css')
<link rel="stylesheet" href="/css/dashboard.css" />
@endsection

@section('content')
<section class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="pb-md-4 mx-auto text-center">
        <h1 class="fw-normal p-3">Dashboard</h1>
        <div class="border-bottom"></div>
      </div>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col-md-4 mt-4 mt-md-0">
      <a href="/dashboard/siswa" class="text-decoration-none">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal text-muted"><span class="jumlah-siswa">2</span> jumlah siswa</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><i class="bi bi-people-fill"></i></h1>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="/dashboard/kelas" class="text-decoration-none">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal text-muted"><span class="jumlah-kelas">10</span> jumlah kelas</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><i class="bi bi-house-door-fill"></i></h1>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="/dashboard/jurusan" class="text-decoration-none">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal text-muted"><span class="jumlah-jurusan">4</span> jumlah jurusan</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><i class="bi bi-file-earmark-fill"></i></h1>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>
@endsection