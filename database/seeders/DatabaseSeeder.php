<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Nilai;
use App\Models\NilaiMapel;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create();
        
        Jurusan::create([
            'nm_jurusan' => 'Manajemen Perkantoran',
            'slug' => 'manajemen-perkantoran',
        ]);
        Jurusan::create([
            'nm_jurusan' => 'Akutansi dan Keuangan',
            'slug' => 'akutansi-dan-keuangan',
        ]);
        Jurusan::create([
            'nm_jurusan' => 'Bisnis dan Pemasaran',
            'slug' => 'bisnis-dan-pemasaran',
        ]);
        $rpl = Jurusan::create([
            'nm_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
        ]);

        Kelas::create([
            'jurusan_id' => $rpl->id,
            'nm_kelas' => 'XD RPL',
        ]);
        Kelas::create([
            'jurusan_id' => $rpl->id,
            'nm_kelas' => 'XID RPL',
        ]);
        Kelas::create([
            'jurusan_id' => $rpl->id,
            'nm_kelas' => 'XIID RPL',
        ]);
    }
}
