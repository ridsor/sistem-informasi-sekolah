<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Kelas extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'kelas';
    protected $fillable = ['nm_kelas','jurusan_id'];
    protected $sortable = ['nm_kelas'];

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['j'] ?? false, fn($query, $j) =>
            $query->whereHas('jurusan', fn($query) =>
                $query->where('slug',$j)
            )
        );

        $query->when($filters['s'] ?? false, fn($query, $s) =>
            $query->where('nm_kelas', 'like', $s)
        );
    }
}
