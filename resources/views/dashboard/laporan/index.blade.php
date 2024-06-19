@extends('dashboard.layouts.main')

@section('css')
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@endsection

@section('script')
<script>
  const table = document.getElementById('table');
  if(table) {
    table.addEventListener('click', function(e) {
      if(e.target.id === 'delete') {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            const form = e.target.parentElement.parentElement;
            form.submit();
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      }
    });
  }

  const filterKonfirmasi = document.getElementById('filterKonfirmasi');
  filterKonfirmasi.addEventListener('click',function() {
    const searchForm = document.querySelectorAll('#searchForm');
    const inputs = Array.from(document.querySelectorAll('#input'));
    const inputsForm = Array.from(document.querySelectorAll('#inputForm'));

    let filter = inputs.filter(x => {
      if(x.value) return true;
      return false;
    });
    
    filter = filter.filter((x) => {
      for(const element of inputsForm) {
        if(element.name === x.name) {
          element.value = x.value; 
          return false;
        }
      }
      return true;
    });
    
    for(let i = 0; i < filter.length; i++) {
      const newElementOne = document.createElement('input');
      newElementOne.value = filter[i].value;
      newElementOne.setAttribute('hidden','');
      newElementOne.setAttribute('name',filter[i].name);
      searchForm[0].appendChild(newElementOne);
      const newElementTwo = document.createElement('input');
      newElementTwo.value = filter[i].value;
      newElementTwo.setAttribute('hidden','');
      newElementTwo.setAttribute('id','inputForm');
      newElementTwo.setAttribute('name',filter[i].name);
      searchForm[1].appendChild(newElementTwo);
    }
  })
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('main') 
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/laporan/create" class="tambah-data position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid mb-3 p-0 px-md-3">
        <h2 class="fs-5 text-dark ms-2 ms-md-0 py-3 mb-0">Laporan</h2>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {!! session('success') !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="bg-light border rounded-md-3 overflow-hidden">
          @if($nilais->count())
          <h3 class="fs-6 text-dark ms-2 ms-md-0 mb-0 p-2 text-muted fw-normal">Daftar siswa</h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0" id="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col">@sortablelink('siswa.nm_siswa','Nama')</th>
                  <th scope="col">@sortablelink('siswa.nisn','NISN')</th>
                  <th scope="col">@sortablelink('siswa.nis','NIS')</th>
                  <th scope="col">@sortablelink('kelas.nm_kelas','Kelas')</th>
                  <th scope="col">Semester</th>
                  <th scope="col">@sortablelink('tahun_pelajaran','Tahun Pelajaran')</th>
                  <th scope="col">@sortablelink('jurusan.nm_jurusan','Jurusan')</th>
                  <th scope="col">Foto</th>
                  @can('admin')
                  <th scope="col">Aksi</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                @foreach($nilais as $index => $nilai)
                <tr>
                  <td class="text-center">{{ $index + $nilais->firstItem() }}</td>
                  <td>{{ $nilai->siswa->nm_siswa }}</td>
                  <td>{{ $nilai->siswa->nisn }}</td>
                  <td>{{ $nilai->siswa->nis }}</td>
                  <td>{{ $nilai->kelas->nm_kelas }}</td>
                  <td>{{ $nilai->semester }}</td>
                  <td>{{ $nilai->tahun_pelajaran }}</td>
                  <td>{{ $nilai->siswa->jurusan->nm_jurusan }}</td>
                  @if(empty($nilai->siswa->foto))
                  <td class="text-center"><img src="/img/profile.png" alt="" class="rounded-circle" width="35" height="35"></td>
                  @else
                  <td class="text-center"><img src="/siswa-images/{{ $nilai->siswa->foto }}" alt="" class="rounded-circle" width="35" height="35"></td>
                  @endif
                  @can('admin')
                  <td>
                    <a href="/dashboard/laporan/{{ $nilai->id }}" class="badge bg-success rounded-pil"><i class="bi bi-eye aksi"></i></a>
                    <a href="/dashboard/laporan/{{ $nilai->id }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square aksi"></i></a>
                    <form method="post" class="d-inline-block" action="/dashboard/laporan/{{ $nilai->id }}">
                      @csrf
                      @method('delete') 
                      <button type="button" class="border-0 p-0 bg-transparent"><i class="bi bi-trash badge bg-danger rounded-pill border-0 d-inline-block aksi" id="delete"></i></button>
                    </form>
                  </td>
                  @endcan
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>       
          <div class="d-flex justify-content-center mt-3">
            {{ $nilais->links() }}
          </div>
          @else
          @if (Request::input('s'))
          <h2 class="fs-3 mx-4 py-3 border-bottom"><strong class="text-danger">{{ Request::input('s') }}</strong> - hasil pencarian</h2>
          <h2 class="fs-3 mx-4 py-3 border-bottom">hasil pencarian</h2>
          <p class="mx-4">Jika Anda tidak puas dengan hasilnya silahkan melakukan pencarian lain</p>
          <div class="display-6 fs-3 mb-3 mx-4 py-5">Tidak ada hasil untuk pencarian anda</div>
          @else
          <h2 class="fs-3 mx-4 py-3 border-bottom">Tidak ada hasil</h2>
          <p class="mx-4">Jika Anda tidak puas dengan hasilnya silahkan melakukan pencarian lain</p>
          @endif
          @endif
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
              <span class="input-group-text" id="inputGroup-sizing-default">Kelas</span>
              <input type="text" name="kls" id="input" class="form-control" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" name="smstr" id="input" aria-label="Default select">
                <option selected value="">Semester</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tempat Lahir</span>
              <input type="text" name="tmpt_lhr" id="input" class="form-control" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
              <input type="date" class="form-control" id="input" name="tngl_lhr" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" name="agm" id="input" aria-label="Default select">
                <option selected value="">Agama</option>
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="budha">Budha</option>
                <option value="konghuchu">Kong Hu Chu</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
              <input type="text" name="almt" class="form-control" id="input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" aria-label="Default select" name="j_k" id="input">
                <option selected value="">Jenis Kelamin</option>
                <option value="laki - laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nomor Telp</span>
              <input type="text" class="form-control" id="input" name="np" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="input" id="inputGroup-sizing-default">Nama Ayah</span>
              <input type="text" class="form-control" name="nm_a" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Ibu</span>
              <input type="text" class="form-control" id="input" name="nm_i" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Wali</span>
              <input type="text" class="form-control" id="input" name="nm_w" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tahun Ajaran</span>
              <input type="text" class="form-control" id="input" name="thn_ajrn" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-2">
              <select class="form-select" name="j" aria-label="Default select" id="input">
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
            <button type="button" class="btn btn-primary" id="filterKonfirmasi" data-bs-dismiss="modal">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
@endsection