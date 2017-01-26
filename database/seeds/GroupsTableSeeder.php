<?php

use Illuminate\Database\Seeder;
use App\Question;

class GroupsTableSeeder extends Seeder
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
        DB::table('groups')->delete();

        for($i = 0; $i < 20; ++$i) {
            DB::table('groups')->insert([
                'name' => 'Group' . $i,
            ]);
        }
    }
}
