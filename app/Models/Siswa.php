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

    protected $sortable = [
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
        'nohp',
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['s'] ?? false, fn($query, $s) =>
            $query->where('nm_siswa', 'like', '%'.$s.'%')
            ->orWhere('nisn', 'like', '%'.$s.'%')
            ->orWhere('nis', 'like', '%'.$s.'%')
        );

        // $query->when($filters['kelas'] ?? false, fn($query, $kelas) =>
        //     $query->whereHas('kelas', fn($query) =>
        //         $query->where('nm_kelas', strtoupper($kelas))
        //     )
        // );

        $query->when($filters['jurusan'] ?? false, fn($query, $jurusan) =>
            $query->whereHas('jurusan', fn($query) =>
                $query->where('slug', $jurusan)
            )
        );
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
