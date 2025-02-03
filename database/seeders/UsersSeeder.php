<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@itsolutionstuff.com',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@itsolutionstuff.com',
                'type' => 0,
                'password' => bcrypt('123456'),
                [
                    'name' => 'Admin',
                    'email' => 'admin1@gmail.com',
                    'type' => 1,
                    'password' => bcrypt('12345678'),
                ],
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // Cek berdasarkan email
                [
                    'name' => $user['name'],
                    'type' => $user['type'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}
