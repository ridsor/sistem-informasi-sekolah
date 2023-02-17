@extends('dashboard.layouts.main')

@section('main') 
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/laporan/create" class="tambah-data position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid mb-3 p-0 px-md-3">
        <h2 class="fs-5 text-dark ms-2 ms-md-0 py-3 mb-0">Laporan Nilai Siswa</h2>
        <div class="bg-light border rounded-md-3 overflow-hidden p-2 fs-7">
          <div class="d-flex justify-content-end mb-3">
            <a href="/dashboard/laporan/cetak/{{ $nilai->id }}" class="btn btn-outline-secondary fs-7">Cetak <i class="bi bi-printer"></i></a>
          </div>
          <ul class="list-group mb-3">
            <li class="list-group-item">
              <div class="row justify-content-between">
                <div class="col-md-5 d-flex"><span style="flex:.4">Nama Sekolah</span> <span style="flex:1">: <span class="ms-2">SMK Negeri 2 Ambon</span></span></div>
                <div class="col-md-5 d-flex"><span style="flex:.4">Kelas</span> <span style="flex:1">: <span class="ms-2">{{ $nilai->kelas->nm_kelas }}</span></span></div>
               </div>
            </li>
            <li class="list-group-item">
              <div class="row justify-content-between">
                <div class="col-md-5 d-flex"><span style="flex:.4">Alamat</span> <span style="flex:1">: <span class="ms-2">Jl. Dr. J. Leimena - Hative Besar, Ambon</span></span></div>
                <div class="col-md-5 d-flex"><span style="flex:.4">Semester</span> <span style="flex:1">: <span class="ms-2">{{ ($nilai->semester === 'Ganjil')?'1 (Satu)':'2 (Dua)' }}</span></span></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row justify-content-between">
                <div class="col-md-5 d-flex"><span style="flex:.4">Nama Peserta Didik</span> <span style="flex:1">: <span class="ms-2">{{ $nilai->siswa->nm_siswa }}</span></span></div>
                <div class="col-md-5 d-flex"><span style="flex:.4">Tahun Pelajaran</span> <span style="flex:1">: <span class="ms-2">{{ $nilai->tahun_pelajaran }}</span></span></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row justify-content-between">
                <div class="col-md-5 d-flex"><span style="flex:.4">NIS / NISN</span> <span style="flex:1">: <span class="ms-2">{{ $nilai->siswa->nis }} / {{ $nilai->siswa->nisn }}</span></span></div>
              </div>
            </li>
          </ul>
          <h4 class="fs-6 mb-1">CAPAIAN HASIL BELAJAR</h4>
          <h5 class="fs-7">A. Sikap Spiritual</h5>
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col" width="200">Predikat</th>
                <th scope="col">Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="vertical-align:middle">{{ $nilai->skp_spiritual_predikat }}</td>
                <td>{{ $nilai->skp_spiritual_deskripsi }}</td>
              </tr>
            </tbody>
          </table>
          <h5 class="fs-7">B. Sikap Sosial</h5>
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col" width="200">Predikat</th>
                <th scope="col">Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" style="vertical-align:middle">{{ $nilai->skp_sosial_predikat }}</td>
                <td>{{ $nilai->skp_sosial_deskripsi }}</td>
              </tr>
            </tbody>
          </table>
          <h5 class="fs-7">C. Pengetahuan dan Keterampilan</h5>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th rowspan="2" scope="col">No</th>
                  <th rowspan="2" scope="col">Mata Pelajaran</th>
                  <th scope="col" colspan="4">Pengetahuan</th>
                  <th scope="col" colspan="4">Keterampilan</th>
                </tr>
                <tr>
                  <th scope="col">KKM</th>
                  <th scope="col">Angka</th>
                  <th scope="col">Predikat</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">KKM</th>
                  <th scope="col">Angka</th>
                  <th scope="col">Predikat</th>
                  <th scope="col">Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($nilai_mapel as $x)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $x->nm_mapel }}</td>
                  <td>{{ $x->p_kkm }}</td>
                  <td>{{ $x->p_angka }}</td>
                  <td>{{ $x->p_predikat }}</td>
                  <td style="text-align:justify">{{ $x->p_deskripsi }}</td>
                  <td>{{ $x->k_kkm }}</td>
                  <td>{{ $x->k_angka }}</td>
                  <td>{{ $x->p_predikat }}</td>
                  <td style="text-align:justify">{{ $x->k_deskripsi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
@endsection