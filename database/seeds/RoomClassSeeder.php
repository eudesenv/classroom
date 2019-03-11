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
        factory(App\Room::class)->create([
            'description' => 'Sala 1',
            'availiable' => 1,
        ]);

        factory(App\Room::class)->create([
            'description' => 'Sala 2',
            'availiable' => 0,
        ]);

        $rooms = \App\Room::all();

        factory(App\Lecture::class, 2)->make()->each(function($lecture) use ($rooms){
            $lecture->room_id = $rooms->random()->id;
            $lecture->save();
        });
    }
}
