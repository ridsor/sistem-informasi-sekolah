@extends('dashboard.layouts.main')

@section('css')
<link rel="stylesheet" href="/css/siswa.css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@endsection

@section('main') 
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/siswa/create" class="tambah-siswa position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid mb-3">
        <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2">Siswa</h2>
        <div class="bg-light border rounded-3">
          @if($siswas->count())
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" style="">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col">@sortablelink('nm_siswa','Nama')</th>
                  <th scope="col">@sortablelink('nis','NIS')</th>
                  <th scope="col">@sortablelink('nisn','NISN')</th>
                  <th scope="col">@sortablelink('tempat_lahir','Tempat Lahir')</th>
                  <th scope="col">@sortablelink('tanggal_lahir','Tanggal Lahir')</th>
                  <th scope="col">Agama</th>
                  <th scope="col">@sortablelink('alamat','Alamat')</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">@sortablelink('nohp','Nomor Telp')</th>
                  <th scope="col">@sortablelink('ayah','Nama Ayah')</th>
                  <th scope="col">@sortablelink('ibu','Nama Ibu')</th>
                  <th scope="col">@sortablelink('wali','Nama Wali')</th>
                  <th scope="col">@sortablelink('tahun_ajaran','Tahun Ajaran')</th>
                  <th scope="col">@sortablelink('jurusan.nm_jurusan','Jurusan')</th>
                  <th scope="col">Foto</th>
                  @can('admin')
                  <th scope="col">Aksi</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                @foreach($siswas as $index => $siswa)
                <tr>
                  <td class="text-center">{{ $index + $siswas->firstItem() }}</td>
                  <td>{{ $siswa->nm_siswa }}</td>
                  <td>{{ $siswa->nis }}</td>
                  <td>{{ $siswa->nisn }}</td>
                  <td>{{ $siswa->tempat_lahir }}</td>
                  <td>{{ $siswa->tanggal_lahir }}</td>
                  <td>{{ $siswa->agama }}</td>
                  <td>{{ $siswa->alamat }}</td>
                  <td>{{ $siswa->jenis_kelamin }}</td>
                  <td>{{ $siswa->nohp }}</td>
                  <td>{{ (!$siswa->ayah)? '-' : $siswa->ayah }}</td>
                  <td>{{ (!$siswa->ibu)? '-' : $siswa->ibu }}</td>
                  <td>{{ (!$siswa->wali)? '-' : $siswa->wali }}</td>
                  <td>{{ $siswa->tahun_ajaran }}</td>
                  <td>{{ $siswa->jurusan->nm_jurusan }}</td>
                  {{-- <td><img src="{{ $siswa->foto }}" alt="" class="rounded-circle w-100" width="40" height="40"></td> --}}
                  <td><img src="/img/profile.png" alt="" class="rounded-circle w-100" width="35" height="35"></td>
                  @can('admin')
                  <td>
                    <a href="/dashboard/siswa/{{ $siswa->id }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square"></i></a>
                    <form action="" class="d-inline">
                      @method('delete')
                      <button type="submit" class="badge bg-danger rounded-pill border-0"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                  @endcan
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>       
          @endif
          <div class="d-flex justify-content-center">
            {{ $siswas->links() }}
          </div>
        </div>
      </div>
    </main>
@endsection

@section('modal')
    <div class="modal fade" id="modalFilter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Filter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tempat Lahir</span>
              <input type="text" name="tmpt_lhr" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
              <input type="date" class="form-control" name="tngl_lhr" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" name="agm" aria-label="Default select">
                <option selected value="">Agama</option>
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="konghuchu">Kong Hu Chu</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
              <input type="text" name="almt" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" aria-label="Default select" name="j_k">
                <option selected value="">Jenis Kelamin</option>
                <option value="laki - laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nomor Telp</span>
              <input type="text" class="form-control" name="np" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Ayah</span>
              <input type="text" class="form-control" name="nm_a" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Ibu</span>
              <input type="text" class="form-control" name="nm_i" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Wali</span>
              <input type="text" class="form-control" name="nm_w" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tahun Ajaran</span>
              <input type="text" class="form-control" name="thn_ajrn" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" name="j" aria-label="Default select">
                <option selected value="">Jurusan</option>
                @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->slug }}">{{ $jurusan->nm_jurusan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-2">
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection