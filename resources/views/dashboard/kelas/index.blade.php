@extends('dashboard.layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/kelas.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('main')
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/kelas/create" class="tambah-siswa position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid px-md-3 p-0">
        <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2 ms-2 ms-md-0">Kelas</h2>
        <div class="row m-0">
          <div class="col-md-8 p-0">
            <div class="bg-light border rounded-md-3">
              @if($kelass->count())
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm mb-0 mt-3">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col">@sortablelink('nm_kelas','Nama')</th>
                      <th scope="col">@sortablelink('jurusan.nm_jurusan','Jurusan')</th>
                      @can('admin')
                      <th scope="col">Aksi</th>
                      @endcan
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($kelass as $index => $kelas)
                    <tr>
                      <td class="text-center" width="40">{{ $index + $kelass->firstItem() }}</td>
                      <td>{{ $kelas->nm_kelas }}</td>
                      <td>{{ $kelas->jurusan->nm_jurusan }}</td>
                      @can('admin')
                      <td>
                        <a href="/dashboard/kelas/{{ $kelas->id }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square"></i></a>
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
              <div class="d-flex justify-content-center mt-3">
                {{ $kelass->links() }}
              </div>
              @else
              @if (Request::input('s'))
              <h2 class="fs-3 mx-4 py-3 border-bottom"><strong class="text-danger">{{ Request::input('s') }}</strong> - hasil pencarian</h2>
              @else
              <h2 class="fs-3 mx-4 py-3 border-bottom">hasil pencarian</h2>
              @endif
              <p class="mx-4">Jika Anda tidak puas dengan hasilnya silahkan melakukan pencarian lain</p>
              <div class="display-6 fs-3 mb-3 mx-4 py-5">Tidak ada hasil untuk pencarian anda</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection