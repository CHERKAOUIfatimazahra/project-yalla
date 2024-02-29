<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'start_datetime' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_datetime' => $this->faker->dateTimeBetween('now', '+2 months'),
            'type' => $this->faker->randomElement(['Physical', 'Online']),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'image' => $this->faker->imageUrl(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
            'subcategory_id' => function () {
                return \App\Models\SubCategory::factory()->create()->id;
            },
        ];
    }
}
