<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $customer = fake() -> boolean(70)
            ? Customer::inRandomOrder()->with('addresses.location')->first()
            :null;

        if (isset($customer)) {
            $customerId = $customer->id;
            $customerName = $customer->name;
            $customerUsername = $customer->username;
            $customerPhone = $customer->phone;
            $address = $customer->addresses->random();
            $location = $address->location;
            $customerAddress = $address->address;
        } else {
            $customerId = null;
            $customerName = fake()->name();
            $customerUsername = fake()->userName;
            $customerPhone = fake()->numberBetween(60000000,65999999);
            $location = Location::inRandomOrder()->first();
            $customerAddress = $location->name_tm->random();
        }
        return [
            'location_id' => $location->id,
            'code' => str()->random(10),
            'customer_id' => $customerId,
            'customer_name' => $customerName,
            'customer_username' => $customerUsername,
            'customer_phone' => $customerPhone,
            'customer_address' => $customerAddress,
            'customer_note' => fake()->boolean(70) ? fake()->sentence(rand(1,20)) : null,
            'delivery_fee' => $location->delivery_fee,
            'platform' => rand(0,2),
            'language' => rand(0,1),
            'payment' => rand(0,2),
            'status' => rand(0,4),
            'created_at' => Carbon::now()->subDays(rand(0,100)),
        ];
    }
}
