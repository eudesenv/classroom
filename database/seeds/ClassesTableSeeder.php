<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Classe::class, 2)->create();

        $rooms = \App\Room::where(['availiable' => 1])->get();
        $subject = \App\Subject::all();
        $classe = \App\Classe::all();

        factory(App\Lecture::class, 2)->make()->each(function($lecture) use ($rooms, $classe, $subject)
        {
            $lecture->room_id = $rooms->random()->id;
            $lecture->classe_id = $classe->random()->id;
            $lecture->subject_id = $subject->random()->id;
            $lecture->save();
        });
    }
}
