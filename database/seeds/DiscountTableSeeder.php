<?php

use App\Discount;
use Illuminate\Database\Seeder;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dis =  Discount::create([
            'id' => 'diskon123',
            'code' => 'DISKON123',
            'discount' => '0.1',
            'from' => '2020-02-02',
            'to' => '2020-04-02'
        ]);
    }
}
