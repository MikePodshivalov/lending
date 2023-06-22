<?php

namespace Database\Factories;

use App\Models\Enums\LoanStatus;
use App\Models\Enums\LoanType;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

/**
 * @extends Factory<Loan>
 */
class LoanFactory extends Factory
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
            'name' => Arr::random(['ООО', 'АО', 'ПАО', 'ИП']) . ' "' . $faker->text(rand(5, 20)) . '"',
            'type' => Arr::random(LoanType::cases()),
            'amount' => rand(1, 400) * 10,
            'status' => Arr::random(LoanStatus::cases()),
        ];
    }
}
