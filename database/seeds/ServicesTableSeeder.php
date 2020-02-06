<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([[
            'id' => 'asmatakuliah',
            'name' => 'Asisten Matakuliah', //berdasarkan file excel, berarti id = 1
        ],
        [
            'id' => 'asbimbinganbelajar',
            'name' => 'Asisten Bimbel',
        ],
        [
            'id' => 'aspraktikum',
            'name' => 'Asisten Praktikum',
        ],
        [
            'id' => 'aspenelitian',
            'name' => 'Asisten Penelitian',
        ],
        [
            'id' => 'asproyek',
            'name' => 'Asisten Proyek'
        ],
        [
            'id' => 'aspengabdian',
            'name' => 'Asisten Pengabdian',

        ],
        [
            'id' => 'askarya',
            'name' => 'Asisten Karya'
        ],[
            'id' => 'asdesainer',
            'name' => 'Asisten Designer'
        ]
        
        //dst tambahin lagi
        ]);
    }
}
