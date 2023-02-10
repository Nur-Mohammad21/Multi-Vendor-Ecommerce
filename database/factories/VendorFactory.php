<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vendor::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'pincode' => $this->faker->randomDigit(1,99999),
            'mobile' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'country_code' => rand(1,9999),
            'status' => 1,
        ];
    }
}
