<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = \App\Subject::all();
        $classe = \App\Classe::all();

        factory(App\Test::class, 3)->make()->each(function($test) use ($classe, $subject)
        {
            $test->classe_id = $classe->random()->id;
            $test->subject_id = $subject->random()->id;
            $test->save();
        });

        $students = App\Student::all();
        $tests = App\Test::all();

        foreach ($students as $student) {
            factory(App\Note::class, 1)->make()->each(function($note) use ($student, $tests)
            {
                $note->test_id = $tests->random()->id;
                $note->student_id = $student->id;
                $note->save();
            });
        }

    }
}
