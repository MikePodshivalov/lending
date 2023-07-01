<?php

namespace Database\Factories;

use App\Models\Enums\ProjectStatus;
use App\Models\Enums\ProjectType;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'name' => Arr::random(['ООО', 'АО', 'ПАО', 'ИП']) . ' "' . $faker->words(rand(1, 3), true) . '"',
            'type' => Arr::random(ProjectType::cases()),
            'amount' => rand(1, 400) * 10,
            'status' => Arr::random(ProjectStatus::cases()),
        ];
    }
}
