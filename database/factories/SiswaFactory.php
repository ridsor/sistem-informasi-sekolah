<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Siswa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jurusan_id' => mt_rand(1,4),
            'slug' => $this->faker->slug(2),
            'nis' => $this->faker->unique()->numerify('######'),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nm_siswa' => $this->faker->name(),
            'alamat' => $this->faker->randomElement(['Wayame', 'Kamiri', 'Wailela', 'Wailete', 'Rumah tiga', 'Laha', 'Passo', 'Poka', 'Kotja', 'Waiheru']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Budha']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->word(),
            'tanggal_lahir' => $this->faker->date(),
            'nohp' => '08'.$this->faker->unique()->numerify('##########'),
            'ayah' => $this->faker->name(),
            'ibu' => $this->faker->name(),
            'wali' => '',
            'tahun_ajaran' => $this->faker->randomElement(['2019/2020', '2020/2021', '2021/2022']),
            'foto' => $this->faker->unique()->url(),
        ];
    }
}
