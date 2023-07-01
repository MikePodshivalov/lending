<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Project;
use App\Models\User;
use Database\Factories\ProjectFactory;
use Database\Seeders\Trait\HasProgressBar;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

class DivisionSeeder extends Seeder
{
    use HasProgressBar;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = 1;

        $this->runWithProgressBar(
            quantity: $quantity,
            callback: function (ProgressBar $bar) use ($quantity) {
                $records = [
                    [
                        'name' => 'Управление корпоративного кредитования',
                        'short' => 'УКК',
                    ],
                    [
                        'name' => 'Департамент корпоративного бизнеса',
                        'short' => 'ДКБ',
                    ],
                    [
                        'name' => 'Правовой департамент',
                        'short' => 'ПД',
                    ],
                ];

                /** @var Division $division */
                foreach (Division::factory()->createMany($records) as $division) {
                    $division->save();
                    $division->refresh();

                    $bar->advance();
                }
            },
        );
    }
}
