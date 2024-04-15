@extends('dashboard.layouts.main')

@section('css')
<link rel="stylesheet" href="/css/siswa.css" />
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
        if(element.name === x.name) return false;
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
      <a href="/dashboard/siswa/create" class="tambah-data position-fixed btn btn-success rounded-circle" style="padding-left: .7rem !important; padding-right: .7rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid mb-3 p-0 px-md-3">
        <h2 class="fs-5 text-dark ms-2 ms-md-0 py-3 mb-0">Siswa</h2>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {!! session('success') !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="bg-light border rounded-md-3 overflow-hidden">
          @if($siswas->count())
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm mb-0 mt-3" id="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col">@sortablelink('nm_siswa','Nama')</th>
                  <th scope="col">@sortablelink('nisn','NISN')</th>
                  <th scope="col">@sortablelink('nis','NIS')</th>
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
                  <td>{{ $siswa->nisn }}</td>
                  <td>{{ $siswa->nis }}</td>
                  <td>{{ $siswa->tempat_lahir }}</td>
                  <td>{{ $siswa->tanggal_lahir }}</td>
                  <td>{{ $siswa->agama }}</td>
                  <td>{{ $siswa->alamat }}</td>
                  <td>{{ $siswa->jenis_kelamin }}</td>
                  <td>{{ $siswa->nohp }}</td>
                  <td>{{ (empty($siswa->ayah))? '-' : $siswa->ayah }}</td>
                  <td>{{ (empty($siswa->ibu))? '-' : $siswa->ibu }}</td>
                  <td>{{ (empty($siswa->wali))? '-' : $siswa->wali }}</td>
                  <td>{{ $siswa->tahun_ajaran }}</td>
                  <td>{{ $siswa->jurusan->nm_jurusan }}</td>
                  @if(empty($siswa->foto))
                  <td><img src="/img/profile.png" alt="" class="rounded-circle" width="35" height="35"></td>
                  @else
                  <td><img src="/siswa-images/{{ $siswa->foto }}" alt="" class="rounded-circle" width="35" height="35"></td>
                  @endif
                  @can('admin')
                  <td>
                    <a href="/dashboard/siswa/{{ $siswa->slug }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square aksi"></i></a>
                    <form method="post" class="d-inline-block" action="/dashboard/siswa/{{ $siswa->slug }}">
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
            {{ $siswas->links() }}
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
              <span class="input-group-text" id="inputGroup-sizing-default">Tempat Lahir</span>
              <input type="text" name="tmpt_lhr" id="input" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
              <input type="date" class="form-control" id="input" name="tngl_lhr" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
              <input type="text" name="almt" class="form-control" id="input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
              <input type="text" class="form-control" id="input" name="np" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="input" id="inputGroup-sizing-default">Nama Ayah</span>
              <input type="text" class="form-control" name="nm_a" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Ibu</span>
              <input type="text" class="form-control" id="input" name="nm_i" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Nama Wali</span>
              <input type="text" class="form-control" id="input" name="nm_w" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-2">
              <span class="input-group-text" id="inputGroup-sizing-default">Tahun Ajaran</span>
              <input type="text" class="form-control" id="input" name="thn_ajrn" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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