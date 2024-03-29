<?php

use Illuminate\Database\Seeder;

class RoomClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\School::class, 2)->make()->each(function($school){
            $school->save();

            factory(App\Room::class)->create([
                'description' => 'Sala 1',
                'availiable' => 1,
                'school_id' => $school->id
            ]);

            factory(App\Room::class)->create([
                'description' => 'Sala 2',
                'availiable' => 0,
                'school_id' => $school->id
            ]);
        });
    }
}
