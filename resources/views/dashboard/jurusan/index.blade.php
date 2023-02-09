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
        })
      }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('main')
    <main class="position-relative">
      @can('admin')
      <a href="/dashboard/jurusan/create" class="tambah-data position-fixed btn btn-success rounded-circle " style="padding-left: .7rem !important; padding-right: .7rem !important"><i class="bi bi-plus fs-4"></i></a>
      @endcan
      <div class="container-fluid p-0 px-md-3">
        <h2 class="fs-5 text-dark d-inline-block py-3 mb-0 ms-2 ms-md-0">Jurusan</h2>
        <div class="row m-0">
          <div class="col-md-8 p-0">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {!! session('success') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="bg-light border rounded-md-3">
              @if ($jurusans->count())
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm mt-3 mb-0" id="table">
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
                        <a href="/dashboard/kelas?j={{ $jurusan->slug }}" class="badge bg-success rounded-pill"><i class="bi bi-eye aksi"></i></a>
                        @can('admin')
                        <a href="/dashboard/jurusan/{{ $jurusan->slug }}/edit" class="badge bg-warning rounded-pill"><i class="aksi bi bi-pencil-square"></i></a>
                        <form action="/dashboard/jurusan/{{ $jurusan->slug }}" class="d-inline" method="post">
                          @csrf
                          @method('delete')
                          <button type="button" class="border-0 p-0 bg-transparent"><i class="bi bi-trash badge bg-danger rounded-pill border-0 d-inline-block aksi" id="delete"></i></button>
                        </form>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>     
              <div class="d-flex justify-content-center mt-3">
                {{ $jurusans->links() }}
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