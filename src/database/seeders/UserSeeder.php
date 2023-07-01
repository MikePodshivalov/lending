<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Database\Factories\ProjectFactory;
use Database\Seeders\Trait\HasProgressBar;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

class UserSeeder extends Seeder
{
    use HasProgressBar;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = intval(env('BASE_SEEDER_ITEMS_QUANTITY', 50));

        $this->runWithProgressBar(
            quantity: $quantity,
            callback: function (ProgressBar $bar) use ($quantity) {
                /** @var User $user */
                foreach (User::factory(count: $quantity)->make() as $user) {
                    $user->save();
                    $user->refresh();

                    $bar->advance();
                }
            },
        );
    }
}
