<?php

use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
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
        DB::table('classrooms')->delete();

        for($i = 0; $i < 20; ++$i)
        {
            DB::table('classrooms')->insert([
                'name' => 'Classroom' . $i,
                'status' => 0,
            ]);
        }
    }
}
