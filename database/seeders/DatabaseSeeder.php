<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'blkevr',
            'email' => 'blkevr@gmail.com',
            'password' => Hash::make('12345')
        ]);

        $user->profile()->create([
            'name' => 'Arthur'
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);

    }
}
