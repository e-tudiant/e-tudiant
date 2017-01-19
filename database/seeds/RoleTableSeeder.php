<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }
        DB::table('roles')->truncate();
        Role::create([
            'id'            => 1,
            'name'          => 'admin',
            'description'   => 'Administrateur'
        ]);
        Role::create([
            'id'            => 2,
            'name'          => 'formateur',
            'description'   => 'Formateur'
        ]);
        Role::create([
            'id'            => 3,
            'name'          => 'apprenant',
            'description'   => 'Apprenant'
        ]);
    }
}
