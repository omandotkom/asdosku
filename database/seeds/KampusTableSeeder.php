<?php

use Illuminate\Database\Seeder;

class KampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kampus')->insert([
            [
                'name' => '(UNSOED) Universitas Jendral Sudirman'
            ],
            [
                'name' => 'Poltekes) Poli Teknik Kesehatan Negri Semarang Kampus Purwokerto'
            ],
            [
                'name' => '(IAIN) Institut Agama Islam Negri Purwokerto'
            ],
            [
                'name' => '(ITTP) Institut Teknologi Telkom Purwokerto'
            ],
            [
                'name' => '(UMP) Universitas Muhammadiyah Purwokerto'
            ],
            [
                'name' => '(UNWIKU) Universitas Wijaya Kusuma Purwokerto'
            ], [
                'name' => '(SWU) Sekolah Tinggi Manajemen Informatika dan Komputer Widya Utama Purwokerto'
            ], [
                'name' => 'Akademi Manajemen Informatika dan Komputer BSI Purwokerto'
            ], [
                'name' => 'Sekolah Tinggi Teknik Wiworotomo Purwokerto'
            ], [
                'name' => 'Akademi Kebidanan YLPP Purwokerto'
            ], [
                'name' => 'Sekolah Tinggi Manajemen Informatika dan Komputer Amikom Purwokerto'
            ]


        ]);
    }
}
