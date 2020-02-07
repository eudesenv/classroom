<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->states('admin')->create([
            'name' => 'Administrador',
            'email' => 'eudes.jf@gmail.com'
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'name' => 'Usuário Comum',
            'email' => 'eudes_jf@hotmail.com'
        ]);

        factory(\App\User::class, 1)->states('user')->create();
    }
}
