<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if ($email && $password)
        {
            \DB::table('users')->updateOrInsert(
                [
                    'email' => $email,
                ],
                [
                    'password' => bcrypt($password),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
