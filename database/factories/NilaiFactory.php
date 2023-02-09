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
            'tahun_ajaran' => $this->faker->numerify('####/####'),
            'sikap' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'kompetensi' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'keterampilan' => $this->faker->randomElement(['A', 'B', 'C', 'D']),

        ];
    }
}
