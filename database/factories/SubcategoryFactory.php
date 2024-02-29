<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryNames = ['business', 'social', 'cultural', 'educational', 'sporting', 'charity', 'entertainment', 'gaming', 'anime'];

        return [
            'name' => function (array $attributes) use ($categoryNames) {
                $categoryName = $categoryNames[array_rand($categoryNames)];
                return $this->faker->unique()->word . ' ' . $categoryName;
            },
            'category_id' => function () {
                return Subcategory::factory()->create()->id;
            },
        ];
    }
}
