@extends('dashboard.layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/kelas.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('main')
    <main class="position-relative">
      <a href="/dashboard/kelas/create" class="tambah-siswa position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      <div class="container-fluid">
        <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2">Kelas</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="bg-light border rounded-3">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm my-3">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col">@sortablelink('nm_kelas','Nama')</th>
                      <th scope="col">@sortablelink('jurusan.nm_jurusan','Jurusan')</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($kelass as $index => $kelas)
                    <tr>
                      <td class="text-center" width="40">{{ $index + $kelass->firstItem() }}</td>
                      <td>{{ $kelas->nm_kelas }}</td>
                      <td>{{ $kelas->jurusan->nm_jurusan }}</td>
                      <td>
                        <a href="/dashboard/kelas/{{ $kelas->id }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square"></i></a>
                        <form action="" class="d-inline">
                          @method('delete')
                          <button class="badge bg-danger rounded-pill border-0"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>     
              <div class="d-flex justify-content-center">
                {{ $kelass->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection