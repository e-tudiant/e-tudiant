<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
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
        DB::table('modules')->delete();

        for($i = 0; $i < 10; ++$i)
        {
            DB::table('modules')->insert([
                'name' => 'Module' . $i,
                'image_url' => 'img_' . $i,
                'slider_url' => 'slider_url_' . $i,
                'slider_token' => 'slider_token_' . $i,
            ]);
        }
    }
}
