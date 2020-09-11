<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UsersTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            $user->api_token = Str::random(150);
            $user->save();
        }
    }
}
