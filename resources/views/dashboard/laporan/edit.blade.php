@extends('dashboard.layouts.main')

@section('css')
<link rel="stylesheet" href="/css/laporan.css">
@endsection

@section('script')
<script>

const jumlahMataPelajaran = document.getElementById('jumlahMataPelajaran');
jumlahMataPelajaran.addEventListener('keyup', function () {
let angka = jumlahMataPelajaran.value;
const tbody = document.getElementById('tbody');
let newElement = '';
while (0 < angka) {
  newElement += `
  <tr>
    <td><input type="text" class="form-control" name="nm_mapel[]" /></td>
    <td><input type="text" class="form-control" name="p_kkm[]"" /></td>
    <td><input type="text" class="form-control" }" name="p_angka[]"" /></td>
    <td>
      <select class="form-select" aria-label="Default select" name="p_predikat[]">
        <option selected value=""></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>
    </td>
    <td><textarea class="form-control" name="p_deskripsi[]" style="height: 0px !important"></textarea></td>
    <td><input type="text" class="form-control" name="k_kkm[]"" /></td>
    <td><input type="text" class="form-control" name="k_angka[]"" /></td>
    <td>
      <select class="form-select" aria-label="Default select" name="k_predikat[]">
        <option selected value=""></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>
    </td>
    <td><textarea class="form-control" name="k_deskripsi[]" style="height: 0px !important"></textarea></td>
  </tr>`;
  angka--;
}
tbody.innerHTML = newElement;
});
</script>
@endsection

@section('main')
<main class="position-relative">
  <div class="container-fluid mb-3 p-0 px-md-3">
    <h2 class="fs-5 text-dark ms-2 ms-md-0 py-3 mb-0">Edit Nilai Siswa</h2>
    <form class="form form-create" method="post" action="/dashboard/laporan/{{ $nilai->id }}">
      @method('put')
      @csrf
      <div class="bg-light border rounded-md-3 overflow-hidden py-3">
        <div class="row px-3">
          <div class="col-md-6 mb-3">
            <div class="form-floating">
              <input type="number" class="form-control @error('nisn')is-invalid @enderror" name="nisn" id="nisn" placeholder="NISN" value="{{ old('nisn',$nilai->siswa->nisn) }}" />
              <label for="nisn">NISN</label>
              @error('nisn')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control @error('kelas')is-invalid @enderror" name="kelas" id="kelas" placeholder="Kelas" value="{{ old('kelas',$nilai->kelas->nm_kelas) }}" />
              <label for="kelas">Kelas</label>
              @error('kelas')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <select class="form-select p-3 @error('semester')is-invalid @enderror" aria-label="Default select" name="semester">
              @foreach($semester as $x)
              @if($x === old('semester',$nilai->semester))
              <option selected value="{{ $x }}">{{ $x }}</option>
              @else
              <option value="{{ $x }}">{{ $x }}</option>
              @endif
              @endforeach
            </select>
            @error('semester')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control @error('tahun_pelajaran')is-invalid @enderror" name="tahun_pelajaran" id="tahun_pelajaran" placeholder="Tahun Pelajaran" value="{{ old('tahun_pelajaran',$nilai->tahun_pelajaran) }}" />
              <label for="tahun_pelajaran">Tahun Pelajaran</label>
              @error('tahun_pelajaran')
              <div class="invalid-feedback text-start">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        <div class="col-md-6 mb-3">
          <h5 class="fs-6">Sikap Spiritual</h5>
          <select class="form-select p-3 mb-2 @error('skp_spiritual_predikat')is-invalid @enderror" aria-label="Default select" name="skp_spiritual_predikat">
            @foreach($predikat as $x)
            @if (old('skp_spiritual_predikat',$nilai->skp_spiritual_predikat) === $x)
            <option value="{{ $x }}" selected>{{ $x }}</option>
            @else
            <option value="{{ $x }}">{{ $x }}</option>
            @endif
            @endforeach
          </select>
          @error('skp_spiritual_predikat')
          <div class="invalid-feedback text-start">
            {{ $message }}
          </div>
          @enderror
          <div class="form-floating">
            <textarea class="form-control @error('skp_spiritual_deskripsi')is-invalid @enderror" placeholder="Deskripsi" id="floatingTextarea2" style="height: 100px" name="skp_spiritual_deskripsi">{{ old('skp_spiritual_deskripsi',$nilai->skp_spiritual_deskripsi) }}</textarea>
            <label for="floatingTextarea2">Deskripsi</label>
            @error('skp_spiritual_deskripsi')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <h5 class="fs-6">Sikap Sosial</h5>
          <select class="form-select p-3 mb-2 @error('skp_sosial_predikat')is-invalid @enderror" aria-label="Default select" name="skp_sosial_predikat">
            @foreach($predikat as $x)
            @if (old('skp_sosial_predikat',$nilai->skp_sosial_predikat) === $x)
            <option value="{{ $x }}" selected>{{ $x }}</option>
            @else
            <option value="{{ $x }}">{{ $x }}</option>
            @endif
            @endforeach
          </select>
          @error('skp_sosial_predikat')
          <div class="invalid-feedback text-start">
            {{ $message }}
          </div>
          @enderror
          <div class="form-floating">
            <textarea class="form-control @error('skp_sosial_deskripsi')is-invalid @enderror" placeholder="Deskripsi" id="floatingTextarea2" style="height: 100px" name="skp_sosial_deskripsi">{{ old('skp_sosial_deskripsi',$nilai->skp_sosial_deskripsi) }}</textarea>
            <label for="floatingTextarea2">Deskripsi</label>
            @error('skp_sosial_deskripsi')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
            @enderror
          </div>
      </div>
      <div class="col-md-6">
        <div class="input-group mb-3">
          <span class="input-group-text">Jumlah Mata Pelajaran</span>
          <input type="number" class="form-control" id="jumlahMataPelajaran" value="1" />
        </div>
      </div>
      <div class="table-responsive mb-3">
        <table class="table table-bordered text-center mb-0" style="width: 1100px !important">
          <thead>
            <tr>
              <th rowspan="2" scope="col" style="vertical-align: middle">Mata Pelajaran</th>
              <th scope="col" colspan="4">Pengetahuan</th>
              <th scope="col" colspan="4">Keterampilan</th>
            </tr>
            <tr>
              <th scope="col" width="65">KKM</th>
              <th scope="col" width="65">Angka</th>
              <th scope="col" width="80">Predikat</th>
              <th scope="col" width="220">Deskripsi</th>
              <th scope="col" width="65">KKM</th>
              <th scope="col" width="65">Angka</th>
              <th scope="col" width="80">Predikat</th>
              <th scope="col" width="220">Deskripsi</th>
            </tr>
          </thead>
          <tbody id="tbody">
            @if(!empty(old('nm_mapel')))
            @for($i = 0; $i < count(old('nm_mapel')); $i++)
            <input type="text" hidden value="{{ $x->id }}" name="nilai_mapel_id[]">
            <tr>
              <td><input type="text" class="form-control @error('nm_mapel[]')is-invalid @enderror" name="nm_mapel[]" value="{{ old('nm_mapel')[$i] }}"/></td>
              <td><input type="text" class="form-control @error('p_kkm[]')is-invalid @enderror" name="p_kkm[]" value="{{ old('p_kkm')[$i] }}" /></td>
              <td><input type="text" class="form-control @error('p_angka[]')is-invalid @enderror" name="p_angka[]" value="{{ old('p_angka')[$i] }}" /></td>
              <td>
                <select class="form-select @error('p_predikat[]')is-invalid @enderror" aria-label="Default select" name="p_predikat[]" id="p_predikat">
                  @foreach($predikat as $j)
                  @if($j === old('p_predikat')[$i])
                  <option selected value="{{ $j }}">{{ $j }}</option>
                  @else
                  <option value="{{ $j }}">{{ $j }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
              <td><textarea class="form-control @error('p_deskripsi[]')is-invalid @enderror" name="p_deskripsi[]" style="height: 0px !important">{{ old('p_deskripsi')[$i] }}</textarea></td>
              <td><input type="text" class="form-control @error('k_kkm[]')is-invalid @enderror" name="k_kkm[]" value="{{ old('k_kkm')[$i] }}" /></td>
              <td><input type="text" class="form-control @error('k_angka[]')is-invalid @enderror" name="k_angka[]" value="{{ old('k_angka')[$i] }}" /></td>
              <td>
                <select class="form-select @error('k_predikat[]')is-invalid @enderror" aria-label="Default select" name="k_predikat[]" id="k_predikat">
                  @foreach($predikat as $j)
                  @if($j === old('k_predikat')[$i])
                  <option selected value="{{ $j }}">{{ $j }}</option>
                  @else
                  <option value="{{ $j }}">{{ $j }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
              <td><textarea class="form-control @error('k_deskripsi[]')is-invalid @enderror" name="k_deskripsi[]" style="height: 0px !important">{{ old('k_deskripsi')[$i] }}</textarea></td>
            </tr>
            @endfor
            @else
            @foreach($nilai->nilai_mapels as $x)
            <input type="text" hidden value="{{ $x->id }}" name="nilai_mapel_id[]">
            <tr>
              <td><input type="text" class="form-control @error('nm_mapel[]')is-invalid @enderror" name="nm_mapel[]" value="{{ $x->nm_mapel }}"/></td>
              <td><input type="text" class="form-control @error('p_kkm[]')is-invalid @enderror" name="p_kkm[]" value="{{ $x->p_kkm }}"/></td>
              <td><input type="text" class="form-control @error('p_angka[]')is-invalid @enderror" name="p_angka[]" value="{{ $x->p_angka }}"/></td>
              <td>
                <select class="form-select @error('p_predikat[]')is-invalid @enderror" aria-label="Default select" name="p_predikat[]">
                  @foreach($predikat as $j)
                  @if ($j === $x->p_predikat)
                  <option selected value="{{ $j }}">{{ $j }}</option>
                  @else
                  <option value="{{ $j }}">{{ $j }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
              <td><textarea class="form-control @error('p_deskripsi[]')is-invalid @enderror" name="p_deskripsi[]" style="height: 0px !important">{{ $x->p_deskripsi }}</textarea></td>
              <td><input type="text" class="form-control @error('k_kkm[]')is-invalid @enderror" name="k_kkm[]" value="{{ $x->k_kkm }}"/></td>
              <td><input type="text" class="form-control @error('k_angka[]')is-invalid @enderror" name="k_angka[]" value="{{ $x->k_angka }}"/></td>
              <td>
                <select class="form-select @error('k_predikat[]')is-invalid @enderror" aria-label="Default select" name="k_predikat[]">
                  @foreach($predikat as $j)
                  @if ($j === $x->k_predikat)
                  <option selected value="{{ $j }}">{{ $j }}</option>
                  @else
                  <option value="{{ $j }}">{{ $j }}</option>
                  @endif
                  @endforeach
                </select>
              </td>
              <td><textarea class="form-control @error('k_deskripsi[]')is-invalid @enderror" name="k_deskripsi[]" style="height: 0px !important">{{ $x->k_deskripsi }}</textarea></td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="row m-0">
      <hr class="featurette-divier" />
      <div class="col d-flex justify-content-end gap-3">
        <a href="/dashboard/laporan/" class="btn-outline-secondary btn btn-lg ms-5">Close</a>
        <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
      </div>
    </div>
  </div>
</form>
</div>
</main>
@endsection