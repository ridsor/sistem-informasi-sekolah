<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "slug", "nis", "nisn", "jenis_kelamin", "alamat", "tempat_lahir", "tanggal_lahir"];
    protected $with = ['angkatan', 'jurusan'];
}
