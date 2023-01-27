<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Jurusan extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'jurusan';
    protected $fillable = [
        'nm_jurusan',
        'slug',
    ];
    protected $sortable = [
        'nm_jurusan'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['s'] ?? false, fn($query, $s) =>
            $query->where('nm_jurusan', 'like', '%'.$s.'%')
        );
    }
}
