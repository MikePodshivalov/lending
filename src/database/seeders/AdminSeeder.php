<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Trait\HasProgressBar;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Выполняет создание администратора для системы с
 * дефолтными логином и паролем
 */
class AdminSeeder extends Seeder
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
        $admin = [
            'name' => env('ADMIN_NAME', 'admin'),
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'password' => env('ADMIN_PASSWORD', 'password'),
            'division_id' => 1,
            'email_verified_at' => now(),
        ];

        $this->runWithProgressBar(
            quantity: $quantity,
            callback: function (ProgressBar $bar) use ($quantity, $admin) {
                $user = new User([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => $admin['password'],
                    'division_id' => 1,
                    'email_verified_at' => now(),
                ]);
                $user->save();
                $user->refresh();

                $bar->advance();
            },
        );
    }
}
