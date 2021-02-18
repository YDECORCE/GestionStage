<?php

namespace Database\Factories;

use App\Models\Compagny;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompagnyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Compagny::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company(),
            'adress'=>$this->faker->streetAddress(),
            'postalcode'=>$this->faker->postcode(),
            'city'=>$this->faker->city(),
            'phonenumber'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->safeEmail(),
            'website'=>$this->faker->url(),
            
        ];
    }
}
