<?php

namespace Tests\Feature;

use App\Models\Price;
use App\Models\SourceData;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SourceDataTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_makeDataForGraph()
    {
        $sourceData = new SourceData();
        $sourceData->idUser = 0;
        $sourceData->url = Factory::create()->url();
        $sourceData->pattern = '/html/body/bookstore/book[1]/price';
        $sourceData->min_price = rand(1, 10000)/100;
        $sourceData->save();

        $price1 = new Price();
        $price1->idSourceData = $sourceData->id;
        $price1->price = 199.9;
        $price1->save();

        $price2 = new Price();
        $price2->idSourceData = $sourceData->id;
        $price2->price = 3000.93;
        $price2->save();

        $price3 = new Price();
        $price3->idSourceData = $sourceData->id;
        $price3->price = 2342;
        $price3->save();

        $this->assertEquals(
            [
                0 => ['x' => $price1->created_at->isoFormat('YYYYMMDD') , 'y' => $price1->price],
                1 => ['x' => $price2->created_at->isoFormat('YYYYMMDD') , 'y' => $price2->price],
                2 => ['x' => $price3->created_at->isoFormat('YYYYMMDD') , 'y' => $price3->price]
            ],
            $sourceData->makeDataForGraph()
        );
    }
}
