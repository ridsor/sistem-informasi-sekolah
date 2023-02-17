<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'siswa_id' => mt_rand(1,12),
            'kelas_id' => mt_rand(1,3),
            'semester' => $this->faker->randomElement(['ganjil', 'genap']),
            'tahun_pelajaran' => $this->faker->numerify('####/####'),
            'skp_spiritual_predikat' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'skp_spiritual_deskripsi' => $this->faker->text(100),
            'skp_sosial_predikat' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'skp_sosial_deskripsi' => $this->faker->text(100),
        ];
    }
}
