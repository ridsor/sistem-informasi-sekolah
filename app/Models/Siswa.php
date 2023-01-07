<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        "nm_siswa",
        "slug", 
        "nis", 
        "nisn", 
        "jenis_kelamin", 
        "agama", "alamat", 
        "tempat_lahir", 
        "tanggal_lahir", 
        "nohp", 
        "ayah", 
        "ibu", 
        "wali", 
        "tahun_ajaran", 
        "foto"
    ];
    
    protected $with = ['jurusan'];
}
