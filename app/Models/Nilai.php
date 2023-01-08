<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
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
}
