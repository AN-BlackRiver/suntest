<?php

namespace Database\Seeders;

use App\Models\Role;
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
            'name' => 'arthur',
            'email' => 'arthur@gmail.com',
            'password' => Hash::make('12345')
        ]);

        $user->profile()->create([
            'name' => 'Arthur'
        ]);

        $role = Role::query()->create(['title' => 'admin']);
        $user->roles()->attach($role->id);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);

    }
}
