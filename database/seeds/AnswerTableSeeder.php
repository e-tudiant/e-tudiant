<?php

use Illuminate\Database\Seeder;
use App\Question;

class AnswerTableSeeder extends Seeder
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
        DB::table('answers')->delete();

        $questions = Question::all();
        foreach($questions as $question) {
            $correct_id = rand(0,1);
            for($i = 0; $i < 2; ++$i) {
                DB::table('answers')->insert([
                    'answer' => 'Answer' . $i,
                    'question_id' => $question->id,
                    'correct' => $i == $correct_id ? 1 : 0,
                ]);
            }
        }
    }
}
