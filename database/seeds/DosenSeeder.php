<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'name' => 'Khalid Abdurrahman',
            'email' => 'omandotkom@gmail.com',
            'password' => bcrypt('system3298'),
            'role' => 'dosen',
            'status' => 'aktif',
        ]);
        DB::table('Details')->insert([
            'nik' => '12243223423123',
            'user_id' => $user->id,
            'wa' => "872368762372813",
            'kampus_dosen' => 'IT Telkom Purwokrto'
        ]);
    }
}
