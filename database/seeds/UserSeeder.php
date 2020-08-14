<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'Admin',
                'email' => 'duongson29111997@gmail.com',
                'password' => Hash::make('123456'),
                'description' => 'I\'m an Admin.',
            ],
            [
                'id' => 2,
                'username' => 'Leader',
                'email' => 'sondn.cv@gmail.com',
                'password' => Hash::make('123456'),
                'description' => 'I\'m a Leader.',
            ],
            [
                'id' => 3,
                'username' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('123456'),
                'description' => 'I\'m an Employee.',
            ],
        ]);
    }
}
