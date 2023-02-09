@extends('dashboard.layouts.main')

@section('script')
<script>
  const nm_jurusan = document.getElementById('nm_jurusan');
  const slug = document.getElementById('slug');
  nm_jurusan.addEventListener('keyup',() => {
    fetch(`/dashboard/jurusan/create-slug?nm_jurusan=${nm_jurusan.value}`)
    .then(res => res.json())
    .then(res => slug.value = res.slug);
  });
</script>
@endsection

@section('main')
<main class="position-relative">
  <div class="container-fluid p-0 px-md-3 w-100">
    <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2 ms-2 ms-md-0">Edit Data Jurusan</h2>
    <div class="col-md-8">
      <div class="bg-light border rounded-md-3 py-2">
        <form class="needs-validation form-create m-0" method="post" action="/dashboard/jurusan/{{ $jurusan->slug }}">
          @csrf
          @method('put')
          <div class="row m-0">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('nm_jurusan')is-invalid @enderror" name="nm_jurusan" id="nm_jurusan" placeholder="Nama Jurusan"  value="{{ old('nm_jurusan',$jurusan->nm_jurusan) }}"/>
                <label for="nm_jurusan">Nama Jurusan</label>
                @error('nm_jurusan')
                <div class="invalid-feedback text-start">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row m-0">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug" id="slug" placeholder="Slug"  value="{{ old('slug',$jurusan->slug) }}"/>
                <label for="slug">Slug</label>
                @error('slug')
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