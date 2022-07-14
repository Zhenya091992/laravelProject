<?php

namespace Database\Factories;

use App\Models\SourceData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SourceData>
 */
class SourceDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idUser' => Random::generate(3, '0-9'),
            'url' => $this->faker->url(),
            'pattern' => '/html/body/bookstore/book[1]/price',
            'min_price' => $this->faker->numerify()
        ];
    }
}
