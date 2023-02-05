<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Cviebrock\EloquentSluggable\Sluggable;

class Siswa extends Model
{
    use HasFactory;
    use Sortable;
    use Sluggable;
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

        $query->when($filters['j'] ?? false, fn($query, $j) =>
            $query->whereHas('jurusan', fn($query) =>
                $query->where('slug', $j)
            )
        );

        $query->when($filters['tmpt_lhr'] ?? false, fn($query, $t) =>
            $query->where('tempat_lahir', $t)
        );

        $query->when($filters['tngl_lhr'] ?? false, fn($query, $t) =>
            $query->where('tanggal_lahir', $t)
        );

        $query->when($filters['j_k'] ?? false, fn($query, $x) =>
            $query->where('jenis_kelamin', $x)
        );

        $query->when($filters['agm'] ?? false, fn($query, $x) =>
            $query->where('agama', $x)
        );
        
        $query->when($filters['thn_ajrn'] ?? false, fn($query, $x) =>
            $query->where('tahun_ajaran', 'like', '%'.$x.'%')
        );

        $query->when($filters['np'] ?? false, fn($query, $x) =>
            $query->where('nohp', 'like', '%'.$x.'%')
        );

        $query->when($filters['nm_a'] ?? false, fn($query, $x) =>
            $query->where('ayah', 'like', '%'.$x.'%')
        );

        $query->when($filters['nm_i'] ?? false, fn($query, $x) =>
            $query->where('ibu', 'like', '%'.$x.'%')
        );

        $query->when($filters['nm_w'] ?? false, fn($query, $x) =>
            $query->where('wali', 'like', '%'.$x.'%')
        );
        
        $query->when($filters['almt'] ?? false, fn($query, $x) =>
            $query->where('alamat', $x)
        );
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => ['nm_siswa']
        ]
    ];
}
}
