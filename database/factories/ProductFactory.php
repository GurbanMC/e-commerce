<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            //
        })->afterCreating(function (Product $product){
            //
        });
    }

    public function definition()
    {
        $category = Category::doesntHave('child')->inRandomOrder()->first();
        $brand = Brand::inRandomFirst()->first();
        $gender = fake()->boolean(90) ? AttributeValue::where('attribute_id', 1)->inRandomOrder()->first() :null;
        $color = fake()->boolean(90) ? AttributeValue::where('attribute_id', 2)->inRandomOrder()->first() :null;
        $size = fake()->boolean(90) ? AttributeValue::where('attribute_id', 3)->inRandomOrder()->first() :null;
        $nameTm = fake()->company;
        $nameEn = null;
        $fullNameTm = $brand->name . ' '
            . isset($color) ? $color->name_tm
            . $nameTm . ' '
            . $category->product_name_tm
        return [

        ];
    }
}
