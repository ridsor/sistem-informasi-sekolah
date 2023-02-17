@extends('dashboard.layouts.main')

@section('main')
<main class="position-relative">
  <div class="container-fluid p-0 px-md-3 w-100">
    <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2 ms-2 ms-md-0">Tambah Data Kelas</h2>
    <div class="col-md-8">
      <div class="bg-light border rounded-md-3 pt-3 mb-3">
        <form class="needs-validation form-create m-0" method="post" action="/dashboard/kelas/{{ $kelas->id }}">
          @csrf
          @method('put')
          <div class="row m-0">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('nm_kelas')is-invalid @enderror" name="nm_kelas" id="nm_kelas" placeholder="Nama Kelas"  value="{{ old('nm_kelas',$kelas->nm_kelas) }}"/>
                <label for="nm_kelas">Nama Kelas</label>
                @error('nm_kelas')
                <div class="invalid-feedback text-start">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row m-0">
            <div class="col-md-6">
              <div class="mb-3">
                <select class="form-select p-3 @error('jurusan')is-invalid @enderror" aria-label="Default select" name="jurusan">
                  @foreach ($jurusan as $item)
                  @if ($item->id == old('jurusan',$kelas->jurusan->id))
                  <option selected value="{{ $item->id }}">{{ $item->nm_jurusan }}</option>
                  @else
                  <option value="{{ $item->id }}">{{ $item->nm_jurusan }}</option>
                  @endif
                  @endforeach
                </select>
                @error('jurusan')
                <div class="invalid-feedback text-start">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row m-0">
            <hr class="featurette-divider" />
            <div class="col d-flex justify-content-end gap-3 mb-3">
              <a href="/dashboard/siswa" class="btn btn-lg btn-outline-secondary fs-6" type="button">Close</a>
              <button class="btn btn-lg btn-primary fs-6" type="submit">Daftar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection