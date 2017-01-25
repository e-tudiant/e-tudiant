<?php

use Illuminate\Database\Seeder;
use App\Quizz;

class QuestionTableSeeder extends Seeder
{
    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

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
        DB::table('questions')->delete();

        $quizzs = Quizz::all();
        foreach ($quizzs as $quizz) {
            for($i = 0; $i < 3; ++$i)
            {

                DB::table('questions')->insert([
                    'question' => 'Question' . $i,
                    'quizz_id' => $quizz->id,
                ]);
            }
        }
    }
}
