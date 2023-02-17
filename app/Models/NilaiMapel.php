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
        'p_kkm',
        'p_angka',
        'p_predikat',
        'p_deskripsi',
        'k_kkm',
        'k_angka',
        'k_predikat',
        'k_deskripsi',
    ];
}
