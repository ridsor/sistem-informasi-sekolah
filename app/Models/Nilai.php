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
        'kelas',
        'semester',
        'sikap',
        'kompetensi',
        'keterampilan'
    ];
    protected $sortable = [
        'kelas',
    ];

    public function siswa() {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
