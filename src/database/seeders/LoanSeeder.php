<?php

namespace Database\Seeders;

use App\Models\Loan;
use Database\Factories\LoanFactory;
use Database\Seeders\Trait\HasProgressBar;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

class LoanSeeder extends Seeder
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
                /** @var Loan $loan */
                foreach (Loan::factory(count: $quantity)->make() as $loan) {
                    $loan->save();
                    $loan->refresh();

                    $bar->advance();
                }
            },
        );
    }
}
