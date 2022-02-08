<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
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
            'author_id' => Author::all()->random()->id,
            'publisher_id' => Publisher::all()->random()->id,
            'title' => $this->faker->sentence(4),
            'summary' => $this->faker->paragraph(1),
            'description' => $this->faker->text(500),
            'quantity' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->randomNumber(2),
            'image' => $this->faker->randomElement([
                '1.jpg',
                '2.jpg',
                '3.jpg',
                '4.jpg',
                '5.jpg',
                '6.jpg',
                '7.jpg',
                '7.jpg',
                '8.jpg',
                '9.jpg',
                '10.jpg',
                '11.jpg',
                '12.jpg',
                '13.jpg',
                '14.jpg',
                '15.jpg',
                '16.jpg',
                '17.jpg',
                '18.jpg',
            ]),
            'active' => 1,
        ];
    }
}
