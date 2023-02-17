<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiMapel>
 */
class NilaiMapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nilai_id' => mt_rand(1,12),
            'nm_mapel' => $this->faker->randomElement(['Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaraan', 'Bahasa Indonesia', 'Matematika', 'Sejarah', 'Bahasa Inggris', 'Seni Budaya', 'Muatan Lokal', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'Fisika', 'Kimia', 'Simulasi dan Komunikasi Digital', 'Sistem Komputer', 'Komputer dan Jaringan Dasar', 'Pemrograman Dasar', 'Dasar Desain Grafis']),
            'p_kkm' => mt_rand(75,95),
            'p_angka' => mt_rand(75,95),
            'p_predikat' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'p_deskripsi' => $this->faker->text(100),
            'k_kkm' => mt_rand(75,95),
            'k_angka' => mt_rand(75,95),
            'k_predikat' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'k_deskripsi' => $this->faker->text(100),
        ];
    }
}
