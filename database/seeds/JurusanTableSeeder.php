<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("jurusans")->insert([
            [
                'name' => "Teknik Informatika"
            ],
            [
                'name' => "Desain Komunikasi Visual"
            ],
            [
                'name' => "Teknik Telekomunikasi"
            ],
            [
                'name' => "Ekonomi Industri"
            ], [
                'name' => "Manajemen Informasi"
            ], [
                'name' => "Manajemen Perkantoran"
            ]

        ]);
    }
}
