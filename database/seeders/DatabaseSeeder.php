<?php

namespace Database\Seeders;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
                'role' => '1'
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
            [
                'name' => 'director',
                'email' => 'director@gmail.com',
                'password' => bcrypt('123456'),
                'role' => '2'
            ]
        ];
        User::insert($users);
    }
}
