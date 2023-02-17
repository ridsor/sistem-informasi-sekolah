<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Nilai extends Model
{
    use Sortable;
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'semester',
        'tahun_pelajaran',
        'skp_spiritual_predikat',
        'skp_spiritual_deskripsi',
        'skp_sosial_predikat',
        'skp_sosial_deskripsi',
    ];
    protected $sortable = [
        'tahun_pelajaran'
    ];
    protected $with = ['siswa','kelas','nilai_mapels'];

    public function siswa() {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function nilai_mapels() {
        return $this->hasMany(NilaiMapel::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['s'] ?? false, fn($query, $s) =>
            $query->whereHas('siswa', fn($query) =>
                $query->where('nm_siswa','like','%'.$s.'%')
                ->orWhere('nisn',$s)
                ->orWhere('nis',$s)
            )
        );

        $query->when($filters['kls'] ?? false, fn($query, $x) =>
            $query->whereHas('kelas',fn($query) =>
                $query->where('nm_kelas',$x)
            )
        );

        $query->when($filters['smstr'] ?? false, fn($query,$x) =>
            $query->where('semester',$x)
        );

        $query->when($filters['thn_ajrn'] ?? false, fn($query,$x) =>
            $query->where('tahun_ajaran',$x) 
        );

        $query->when($filters['j'] ?? false, fn($query, $j) =>
            $query->whereHas('jurusan', fn($query) =>
                $query->where('slug', $j)
            )
        );

        $query->when($filters['tmpt_lhr'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('tempat_lahir',$x)
            )
        );

        $query->when($filters['tngl_lhr'] ?? false, fn($query, $t) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('tanggal_lahir', $t)
            )
        );

        $query->when($filters['j_k'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('jenis_kelamin', $x)
            )
        );

        $query->when($filters['agm'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('agama', $x)
            )
        );

        $query->when($filters['np'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('nohp', 'like', '%'.$x.'%')
            )
        );

        $query->when($filters['nm_a'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('ayah', 'like', '%'.$x.'%')
            )
        );

        $query->when($filters['nm_i'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('ibu', 'like', '%'.$x.'%')
            )
        );

        $query->when($filters['nm_w'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('wali', 'like', '%'.$x.'%')
            )
        );
        
        $query->when($filters['almt'] ?? false, fn($query, $x) =>
            $query->whereHas('siswa',fn($query) =>
                $query->where('alamat', $x)
            )
        );
    }
}
