<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TambahanBimbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Bahasa Indonesia', 'Bahasa Inggris','Bahasa Arab','Matematika'];
       
        for($a = 0; $a<4;$a++){
            DB::table('activities')->insert([
        
                [
                    'service_id' => 'asbimbinganbelajar', //1 adalah nomor as-makul pada file excel
                    'name' => 'Les Privat SD '.$arr[$a],
                    'satuan' => 'Orang',
                    'harga' => 170000,
                    
                    'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
                    'asdosku' => 0.2, // artinya 20%
                    'asdos' => 0.8 //artinya 80%
                ],
                [
                    'service_id' => 'asbimbinganbelajar',
                    'name' => 'Les Privat SMP '.$arr[$a],
                    'satuan' => 'Orang',
                    'harga' => 240000,
                    
                    'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
                    'asdosku' => 0.2,
                    'asdos' => 0.8
        
                ],
                [
                    'service_id' => 'asbimbinganbelajar',
                    'name' => 'Les Privat SMA '.$arr[$a],
                    'satuan' => 'Orang',
                    'harga' => 310000,
                   
                    'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
                    'asdosku' => 0.2,
                    'asdos' => 0.8
                ],
                [
                    'service_id' => 'asbimbinganbelajar',
                    'name' => 'Les Privat Mahasiswa dan Umum '.$arr[$a],
                    'satuan' => 'Orang',
                    'harga' => 410000,
                    
                    'keterangan' => 'Maksimal 2 orang perbulan 4x pertemuan',
                    'asdosku' => 0.2,
                    'asdos' => 0.8
        
                ]
            ]
            );
        }
    }
}
