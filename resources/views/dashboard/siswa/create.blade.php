@extends('dashboard.layouts.main')

@section('script')
<script>
  function previewImage() {
    const foto = document.getElementById('foto');
    const imgPreview = document.getElementById('imgPreview');

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);
    ofReader.onload = ofREvent => {
      imgPreview.src = ofREvent.target.result;
    }
  }
</script>
@endsection

@section('main')
<main class="position-relative">
  <div class="container-fluid p-0 px-md-3 w-100">
    <h2 class="fs-5 text-dark d-inline-block mt-3 mb-2 ms-2 ms-md-0">Tambah Data Siswa</h2>
    <div class="bg-light border rounded-md-3 py-2">
      <form class="needs-validation form-create m-0" method="post" action="/dashboard/siswa" enctype="multipart/form-data">
        @csrf
        <div class="row m-0">
          <h4 class="fs-6 mb-3">A. Data Pendaftar</h4>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control @error('nisn')is-invalid @enderror" name="nisn" id="nisn" placeholder="NISN" value="{{ old('nisn') }}"/>
              <label for="nisn">NISN</label>
              @error('nisn')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control @error('nis')is-invalid @enderror" name="nis" id="nis" placeholder="NIS" value="{{ old('nis') }}"/>
              <label for="nis">NIS</label>
              @error('nis')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('nm_siswa')is-invalid @enderror" name="nm_siswa" id="nm_siswa" placeholder="Nama Lengkap" value="{{ old('nm_siswa') }}"/>
              <label for="nm_siswa">Nama Lengkap</label>
              @error('nm_siswa')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('tempat_lahir')is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}"/>
              <label for="tempat_lahir">Tempat lahir</label>
              @error('tempat_lahir')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control @error('tanggal_lahir')is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}"/>
              <label for="tanggal_lahir">Tanggal Lahir</label>
              @error('tanggal_lahir')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <select class="form-select p-3 @error('agama')is-invalid @enderror" aria-label="Default select" name="agama">
                @foreach ($agama as $item)
                @if ($item === old('agama'))
                <option value="{{ $item }}" selected>{{ $item }}</option>
                @else
                <option value="{{ $item }}">{{ $item }}</option>
                @endif
                @endforeach
              </select>
              @error('agama')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('alamat')is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}"/>
              <label for="alamat">Alamat</label>
              @error('alamat')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <select class="form-select p-3 @error('jenis_kelamin')is-invalid @enderror" aria-label="Default select" name="jenis_kelamin">
                @foreach ($jenis_kelamin as $item)
                @if ($item === old('jenis_kelamin'))
                <option selected value="{{ $item }}">{{ $item }}</option>
                @else
                <option value="{{ $item }}">{{ $item }}</option>
                @endif
                @endforeach
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control @error('nohp')is-invalid @enderror" name="nohp" id="nohp" placeholder="Nomor Telp" value="{{ old('nohp') }}"/>
              <label for="nohp">Nomor Telp</label>
              @error('nohp')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('tahun_ajaran')is-invalid @enderror" pattern="[0-9]+/[0-9]{1,4}$" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" value="{{ old('tahun_ajaran') }}"/>
              <label for="tahun_ajaran">Tahun Ajaran</label>
              @error('tahun_ajaran')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
              <small class="text-muted" style="font-size: 13px !important">Format: 0000/0000</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <select class="form-select p-3 @error('jurusan')is-invalid @enderror" aria-label="Default select" name="jurusan">
                @foreach ($jurusan as $item)
                @if ($item->id == old('jurusan'))
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
          <div class="col-md-6">
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" accept="image/*" class="form-control @error('foto')is-invalid @enderror" name="foto" id="foto" onchange="previewImage()"/>
              @error('foto')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
              <small class="text-muted d-block mt-1" style="font-size: 13px !important">Maksimal 1mb</small>
              <small class="text-muted d-block" style="font-size: 13px !important">Format: 3x4</small>
              <img src="/img/profile.png" alt="" width="70" height="100" class="mt-2" id="imgPreview">
            </div>
          </div>
        </div>
        <div class="row m-0">
          <h4 class="mb-3 fs-6">B. Data Orang Tua / Wali</h4>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('ayah')is-invalid @enderror" name="ayah" id="ayah" placeholder="Nama Ayah" value="{{ old('ayah') }}"/>
              <label for="ayah">Nama Ayah</label>
              @error('ayah')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('ibu')is-invalid @enderror" name="ibu" id="ibu" placeholder="Nama Ibu" value="{{ old('ibu') }}"/>
              <label for="ibu">Nama Ibu</label>
              @error('ibu')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('wali')is-invalid @enderror" name="wali" id="wali" placeholder="Nama Wali" value="{{ old('wali') }}"/>
              <label for="wali">Nama Wali</label>
              @error('wali')
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
</main>
@endsection