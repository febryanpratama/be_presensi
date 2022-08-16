<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nip' => '11',
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-30 years', '-20 years'),
            'jenis_kelamin' => $this->faker->randomElement(['Pria', 'Wanita']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'alamat' => $this->faker->address,
            'tanggal_bergabung' => $this->faker->dateTimeBetween('-30 years', '-20 years'),
            'status_karyawan' => $this->faker->randomElement(['Percobaan', 'Tetap', 'Kontrak']),
            'no_telpon' => $this->faker->phoneNumber,
            'jabatan' => $this->faker->randomElement(['Kepala Sekolah', 'Wakil Kepala Sekolah', 'Guru', 'Karyawan']),
            'created_at' => $this->faker->dateTime,
        ];
    }
}
