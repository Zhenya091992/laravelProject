<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSourceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source_data')->insert([
            'id' => 100,
            'idUser' => 10,
            'url' => 'http//example.com/product',
            'pattern' => '//example/div/price',
            'min_price' => rand(100, 1000)
        ]);
        DB::table('source_data')->insert([
            'id' => 101,
            'idUser' => 10,
            'url' => 'http//example.com/product',
            'pattern' => '//example/div/price',
            'min_price' => rand(100, 1000)
        ]);
        DB::table('source_data')->insert([
            'id' => 102,
            'idUser' => 10,
            'url' => 'http//example.com/product',
            'pattern' => '//example/div/price',
            'min_price' => rand(100, 1000)
        ]);
    }
}
