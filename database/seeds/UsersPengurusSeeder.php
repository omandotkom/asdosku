<?php

use Illuminate\Database\Seeder;

class UsersPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(2).'@gmail.com',
            'password' => bcrypt('system3298'),
            'role' => 'hrd',
            'status' => 'aktif',
        ]);
        DB::table('Details')->insert([
            'wa' => Str::random(10),
        ]);
    }
}
