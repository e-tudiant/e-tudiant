<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }
        DB::table('users')->delete();

        DB::table('users')->insert([
            'lastname' => 'T. Kirk',
            'firstname' => 'James',
            'role_id' => '1',
            'email' => 'monadresse@mail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
