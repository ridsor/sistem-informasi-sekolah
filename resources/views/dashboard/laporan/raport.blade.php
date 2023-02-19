<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laporan - {{ $nilai->siswa->nm_siswa }} {{ $nilai->kelas->nm_kelas }} {{ $nilai->semester }}</title>
  <style>
    * {
      font-size: 14px;
    }

    .detail {
      padding: 1rem   1.5rem;
    }
    
    .detail > .col {
      width: 50%
    }

    .detail > .col:nth-child(2) {
      width: 40%;
    }

    .clear {
      clear: both;
    }

    .detail .list {
      display: inline-block;
      width: 180px;
    }

    h2,h3 {
      margin: 0;
    }

    table {
      width: 100%;
      text-align: center;
      padding: 0 20px;
    }
  </style>
</head>
<body>
  <div class="detail">
    <div class="col" style="float: left">
      <ul style="list-style-type: none; padding: 0; margin: 0;">
        <li><div class="list">Nama Sekolah</div><span style="margin-right: 20px">:</span>SMK Negeri 2 Ambon</li>
        <li><div class="list">Alamat</div><span style="margin-right: 20px">:</span>Jl. Dr. J. Leimena - Hative Besar, Ambon</li>
        <li><div class="list">Nama Peserta Didik</div><span style="margin-right: 20px">:</span><strong>{{ $nilai->siswa->nm_siswa }}</strong></li>
        <li><div class="list">Nomor Induk / NISN</div><span style="margin-right: 20px">:</span>{{ $nilai->siswa->nis }} / {{ $nilai->siswa->nisn }}</li>
      </ul>
    </div>
    <div class="col" style="float:right">
      <ul style="list-style-type: none; padding: 0; margin: 0;">
        <li><div class="list">Kelas</div><span style="margin-right: 20px">:</span>{{ $nilai->kelas->nm_kelas }}</li>
        <li><div class="list">Semester</div><span style="margin-right: 20px">:</span>{{ ($nilai->semester === 'Ganjil')?'1 (Satu)':'2 (Dua)' }}</li>
        <li><div class="list">Tahun Pelajaran</div><span style="margin-right: 20px">:</span>{{ $nilai->tahun_pelajaran }}</li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="capaian-hasil-belajar">
    <h2>CAPAIAN HASIL BELAJAR</h2>
    <h3 style="margin-bottom: 3px"><span style="margin-right: 10px;">A.</span> Sikap Spiritual</h3>
    <table border="1" cellspacing="0" style="margin-bottom: 1.5rem">
      <thead>
        <tr>
          <td width="170">Predikat</td>
          <td>Deskripsi</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="font-weight:bold; padding:.3rem">{{ $nilai->skp_spiritual_predikat }}</td>
          <td style="padding:.3rem">{{ $nilai->skp_spiritual_deskripsi }}</td>
        </tr>
      </tbody>
    </table>
    <h3 style="margin-bottom: 3px"><span style="margin-right: 10px;">B.</span> Sikap Sosial</h3>
    <table border="1" cellspacing="0" style="margin-bottom: 1.5rem">
      <thead>
        <tr>
          <td width="170">Predikat</td>
          <td>Deskripsi</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="font-weight:bold; padding:.3rem">{{ $nilai->skp_sosial_predikat }}</td>
          <td style="padding:.3rem">{{ $nilai->skp_sosial_deskripsi }}</td>
        </tr>
      </tbody>
    </table>
    <h3 style="margin-bottom: 3px"><span style="margin-right: 10px;">C.</span> Pengetahuan dan Keterampilan</h3>
    <table border="1" cellspacing="0">
      <thead>
        <tr>
          <th rowspan="2" width="20">No</th>
          <th rowspan="2">Mata Pelajaran</th>
          <th colspan="4">Pengetahuan</th>
          <th colspan="4">Keterampilan</th>
        </tr>
        <tr>
          <th>KKM</th>
          <th>Angka</th>
          <th>Predikat</th>
          <th>Deskripsi</th>
          <th>KKM</th>
          <th>Angka</th>
          <th>Predikat</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($nilai_mapels as $x)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td style="text-align:start">{{ $x->nm_mapel }}</td>
          <td>{{ $x->p_kkm }}</td>
          <td>{{ $x->p_angka }}</td>
          <td>{{ $x->p_predikat }}</td>
          <td style="text-align: justify; padding: 0 8px;">{{ $x->p_deskripsi }}</td>
          <td>{{ $x->k_kkm }}</td>
          <td>{{ $x->k_angka }}</td>
          <td>{{ $x->k_predikat }}</td>
          <td style="text-align: justify; padding: 0 8px;">{{ $x->k_deskripsi }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>