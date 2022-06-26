<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Price;

class PriseFindPriceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_findPrice()
    {
        $this->assertEquals(
            '29.99',
            (new Price())->findPrice(__DIR__ . '/PriceFindPrice.html', '/html/body/bookstore/book[1]/price'),
            'Find price error'
        );

        $this->assertEquals(
            '299.9',
            (new Price())->findPrice(__DIR__ . '/PriceFindPrice.html', '/html/body/bookstore/book[2]/price'),
            'Find price error'
        );
    }
}
