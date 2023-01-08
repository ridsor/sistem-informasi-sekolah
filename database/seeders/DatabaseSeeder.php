<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Nilai;
use App\Models\NilaiMapel;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Siswa::factory(12)->create();
        Nilai::factory(12)->create();
        NilaiMapel::factory(12*16)->create();
        
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
        Jurusan::create([
            'nm_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
        ]);
    }
}
