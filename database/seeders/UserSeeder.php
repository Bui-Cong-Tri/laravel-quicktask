<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'is_active' => true,
        ]);
        for ($i = 0; $i < 100; $i++) {
            User::factory()
                ->has(Article::factory()->count(rand(0, 3)), 'articles')
                ->create();
        }
    }
}
