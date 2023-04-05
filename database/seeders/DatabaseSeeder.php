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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'ridsorgamerz@gmail.com',
            'is_admin' => true,
        ]);

        // Siswa::factory(12)->create();
        // Nilai::factory(12)->create();
        // NilaiMapel::factory(12*16)->create();
        
        // Jurusan::create([
        //     'nm_jurusan' => 'Manajemen Perkantoran',
        //     'slug' => 'manajemen-perkantoran',
        // ]);
        // Jurusan::create([
        //     'nm_jurusan' => 'Akutansi dan Keuangan',
        //     'slug' => 'akutansi-dan-keuangan',
        // ]);
        // Jurusan::create([
        //     'nm_jurusan' => 'Bisnis dan Pemasaran',
        //     'slug' => 'bisnis-dan-pemasaran',
        // ]);
        // Jurusan::create([
        //     'nm_jurusan' => 'Rekayasa Perangkat Lunak',
        //     'slug' => 'rekayasa-perangkat-lunak',
        // ]);

        // Kelas::create([
        //     'jurusan_id' => 4,
        //     'nm_kelas' => 'XD RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 4,
        //     'nm_kelas' => 'XID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 4,
        //     'nm_kelas' => 'XIID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XIID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 2,
        //     'nm_kelas' => 'XIID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 1,
        //     'nm_kelas' => 'XIID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XD RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 2,
        //     'nm_kelas' => 'XID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 2,
        //     'nm_kelas' => 'XD RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 1,
        //     'nm_kelas' => 'XID RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 1,
        //     'nm_kelas' => 'XD RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XIIB RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XIB RPL',
        // ]);
        // Kelas::create([
        //     'jurusan_id' => 3,
        //     'nm_kelas' => 'XB RPL',
        // ]);
    }
}
