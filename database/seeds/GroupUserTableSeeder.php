<?php

use Illuminate\Database\Seeder;
use App\Question;

class GroupUserTableSeeder extends Seeder
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
        DB::table('group_user')->delete();

        for($i = 0; $i < 100; ++$i) {
            DB::table('group_user')->insert([
                'user_id' => rand(1,23),
                'group_id' => rand(1,20),
            ]);
        }
    }
}
