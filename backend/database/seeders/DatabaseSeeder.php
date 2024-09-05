<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'user_id' => ''
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // 他のシーダーも登録できます
        $this->call(SentenceSeeder::class);
    }
}
