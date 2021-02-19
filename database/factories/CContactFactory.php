<?php

namespace Database\Factories;

use App\Models\CContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class CContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->lastName(),
            'firstname'=>$this->faker->firstName(),
            'phonenumber'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->safeEmail(),
            'function'=>$this->faker->jobTitle(),
        ];
    }
}
