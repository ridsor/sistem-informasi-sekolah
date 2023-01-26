<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Siswa extends Model
{
    use HasFactory;
    use Sortable;
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

    public $sortable = [
        'nm_siswa',
        'tahun_ajaran',
        'ayah',
        'ibu',
        'wali',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'nis',
        'nisn',
        'nohp'
    ];
}
