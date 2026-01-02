<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'admin@2026'
        ]);

        $categories = collect(['Laravel', 'React', 'Tailwind'])->map(function ($name) {
            return Category::create([
                'name' => $name,
                'slug' => str($name)->slug(),
            ]);
        });
        Post::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
