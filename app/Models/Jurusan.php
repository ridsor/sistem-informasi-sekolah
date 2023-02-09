<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Cviebrock\EloquentSluggable\Sluggable;

class Jurusan extends Model
{
    use HasFactory;
    use Sortable;
    use Sluggable;
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

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => ['nm_jurusan']
            ]
        ];
    }
}
