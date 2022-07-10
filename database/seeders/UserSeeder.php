<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        \DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'sample',
                'email' => 'sample@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
