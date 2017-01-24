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
            'lastname' => 'admin',
            'firstname' => 'admin',
            'role_id' => '1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'lastname' => 'formateur',
            'firstname' => 'formateur',
            'role_id' => '2',
            'email' => 'formateur@formateur.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'lastname' => 'apprenant',
            'firstname' => 'apprenant',
            'role_id' => '3',
            'email' => 'apprenant@apprenant.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
