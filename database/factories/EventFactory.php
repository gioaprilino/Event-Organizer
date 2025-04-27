<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        'judul_event' => $this->faker->sentence(3),
        'tanggal' => $this->faker->date(),
        'lokasi' => $this->faker->city(),
        'penyelenggara' => $this->faker->company(),
        'deskripsi' => $this->faker->paragraph(),
        'status' => $this->faker->randomElement(['aktif', 'nonaktif']),
        ];
    }
}
