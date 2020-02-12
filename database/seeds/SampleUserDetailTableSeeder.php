<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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
        for ($i = 1; $i < 101; $i++) {
            $user =  App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('system3298'),
                'status' => 'belum_aktif',
                'role' => 'asdos'
            ]);
            DB::table('details')->insert([
                'user_id' => $user->id,
                'kampus_id' => $faker->numberBetween($min = 1, $max = 11),
                'wa' => $faker->phoneNumber,
                'gender' => $faker->randomElement($array = array('Pria', 'Wanita')),
                'semester' => $faker->numberBetween($min = 1, $max = 8),
                'jurusan' => $faker->text($maxNbChars = 20),
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