<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jumlahSiswa' => Siswa::count(),
            'jumlahKelas' => Kelas::count(),
            'jumlahJurusan' => Jurusan::count(),
        ]);
    }
}
