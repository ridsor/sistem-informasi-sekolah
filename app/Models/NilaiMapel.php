<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMapel extends Model
{
    use HasFactory;
    protected $table = 'nilai_mapel';
    public $timestamps = false;
    protected $fillable = [
        'nilai_id',
        'nm_mapel',
        'kkm',
        'n_mapel',
        'n_tugas',
        'n_uts',
        'n_uas'
    ];
}
