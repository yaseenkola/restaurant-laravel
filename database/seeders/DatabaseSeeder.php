<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Yaseen Kola",
            'email' => "yaseenkola@gmail.com",
            'password' => bcrypt('password')
        ]);
    }
}
