<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(QuizzTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(ClassroomGroupTableSeeder::class);
        $this->call(GroupUserTableSeeder::class);
    }
}
