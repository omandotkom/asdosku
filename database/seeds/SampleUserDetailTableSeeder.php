<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class SampleUserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 6; $i++) {
            $user =  App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('system3298'),
                'status' => 'belum_aktif',
                'role' => 'asdos',
                'api_token' => Str::random(150)
            ]);
            DB::table('details')->insert([
                'user_id' => $user->id,
                'kampus_id' => $faker->numberBetween($min = 1, $max = 11),
                'wa' => $faker->phoneNumber,
                'gender' => $faker->randomElement($array = array('Pria', 'Wanita')),
                'semester' => "SarjanaSemester".$faker->numberBetween($min = 1, $max = 8),
                'jurusan_id' => $faker->numberBetween($min = 1, $max = 6),
                'alamat' => $faker->address,
            ]);
            for ($u = 1; $u < 40; $u++) {
                DB::table('prefers')->insert([
                    'user_id' => $user->id,
                    'activity_id' => $u,
                ]);
            }
            DB::table('archives')->insert([
                'user_id' => $user->id,
                'image_name' => 'default.png'
            ]);
        }
    }
}
