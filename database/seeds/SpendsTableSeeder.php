<?php

use App\Spend;
use Illuminate\Database\Seeder;

class SpendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1;$i<=10;$i++){
        Spend::create([
            'note'           => $faker->text,
            'amount'          => $faker->numberBetween(20000,150000),
            'date'       => $faker->dateTimeBetween('-6 months','now',null)
        ]);}
    }
}
