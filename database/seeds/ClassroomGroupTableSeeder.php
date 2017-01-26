<?php

use Illuminate\Database\Seeder;
use App\Question;

class ClassroomGroupTableSeeder extends Seeder
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
        DB::table('classroom_group')->delete();

        for($i = 0; $i < 100; ++$i) {
            DB::table('classroom_group')->insert([
                'classroom_id' => rand(1,20),
                'group_id' => rand(1,20),
            ]);
        }
    }
}
