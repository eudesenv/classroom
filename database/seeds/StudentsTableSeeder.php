<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Student::class, 2)->make()->each(function($student){
            $student->save();

            $classe = \App\Classe::find(1);

            $classe->students()->attach($student->id);

        });



    }
}
