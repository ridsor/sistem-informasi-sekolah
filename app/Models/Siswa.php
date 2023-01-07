<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        "jurusan_id",
        "nm_siswa",
        "slug", 
        "nis", 
        "nisn", 
        "jenis_kelamin", 
        "agama", 
        "alamat", 
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

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
