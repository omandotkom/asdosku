<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::create([
            'name' => Str::random(10),
            'email' => Str::random(2).'@gmail.com',
            'password' => bcrypt('system3298'),
            'role' => 'hrd',
            'status' => 'aktif',
        ]);
        DB::table('details')->insert([
            'user_id' => $user->id,
            'wa' => Str::random(10),
        ]);
        $user =  User::create([
            'name' => Str::random(10),
            'email' => "opr".Str::random(2).'@gmail.com',
            'password' => bcrypt('system3298'),
            'role' => 'operational',
            'status' => 'aktif',
        ]);
        $user =  User::create([
            'name' => Str::random(10),
            'email' => "opr".Str::random(2).'@gmail.com',
            'password' => bcrypt('system3298'),
            'role' => 'operational',
            'status' => 'aktif',
        ]);
        DB::table('details')->insert([
            'user_id' => $user->id,
            'wa' => Str::random(10),
        ]);
        
        //marketing
       /* $user =  User::create([
            'name' => 'Caca',
            'email' => 'cacalovas@gmail.com',
            'password' => bcrypt('asdoskugrowbetter'),
            'role' => 'marketing',
            'status' => 'aktif',
        ]);
        
        $user =  User::create([
            'name' => 'Furqon',
            'email' => 'habibiefurqon444@gmail.com',
            'password' => bcrypt('asdoskugrowbetter'),
            'role' => 'marketing',
            'status' => 'aktif',
        ]);*/
        
        $user =  User::create([
            'name' => 'Riska',
            'email' => 'riskalestr@gmail.com',
            'password' => bcrypt('asdoskugrowbetter'),
            'role' => 'marketing',
            'status' => 'aktif',
        ]);
    }
}
