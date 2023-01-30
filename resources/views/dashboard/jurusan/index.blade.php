@extends('dashboard.layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/jurusan.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('main')
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/jurusan/create" class="tambah-siswa position-fixed btn btn-success rounded-circle px-1 py-1" style="padding-left: .6rem !important; padding-right: .6rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid">
        <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2">Jurusan</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="bg-light border rounded-3">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm my-3">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col">@sortablelink('nm_jurusan','Nama')</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jurusans as $index => $jurusan)
                    <tr>
                      <td class="text-center" width="40">{{ $index + $jurusans->firstItem() }}</td>
                      <td>{{ $jurusan->nm_jurusan }}</td>
                      <td>
                        <a href="/dashboard/kelas?j={{ $jurusan->slug }}" class="badge bg-success rounded-pill"><i class="bi bi-eye"></i></a>
                        @can('admin')
                        <a href="/dashboard/jurusan/{{ $jurusan->slug }}/edit" class="badge bg-warning rounded-pill"><i class="bi bi-pencil-square"></i></a>
                        <form action="" class="d-inline">
                          @method('delete')
                          <button class="badge bg-danger rounded-pill border-0"><i class="bi bi-trash"></i></button>
                        </form>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>     
              <div class="d-flex justify-content-center">
                {{ $jurusans->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection