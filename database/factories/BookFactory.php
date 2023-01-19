<?php

namespace Database\Factories;

use App\Enums\Currency;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(),
            'isbn' => $this->faker->unique()->isbn13(),
            'value' => $this->faker->randomFloat(2, 0, 100),
            'currency' => new Currency($this->faker->randomElement(Currency::toArray())),
        ];
    }
}
