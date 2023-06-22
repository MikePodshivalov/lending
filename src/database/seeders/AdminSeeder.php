<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Выполняет создание администратора для системы с
 * дефолтными логином и паролем
 */
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::createAdmin(
            name: 'admin',
            email: 'admin@admin.com',
            password: 'password',
        );
    }
}
