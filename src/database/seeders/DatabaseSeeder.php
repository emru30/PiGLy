<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        \App\Models\WeightLog::factory(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
