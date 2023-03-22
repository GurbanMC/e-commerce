<?php

namespace Database\Factories;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::where('stock', '>', 0)->inRandomOrder()->first();
        $quantity = rand(1,31);
        return [
            'product_id' => $product->id,
            'price' => $product->getPrice(),
            'quantity' => $quantity,
            'discount_percent' => $product->getDiscountPercent(),
            'total_price' => round($product->getPrice() * $quantity),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
