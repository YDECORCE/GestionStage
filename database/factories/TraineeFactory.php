<?php

namespace Database\Factories;

use App\Models\Trainee;
use Illuminate\Database\Eloquent\Factories\Factory;

class TraineeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //=>$this->faker->sentence(),
            'name'=>$this->faker->lastName(),
            'firstname'=>$this->faker->firstName(),
            'adress'=>$this->faker->streetAddress(),
            'postalcode'=>$this->faker->postcode(),
            'city'=>$this->faker->city(),
            'phonenumber'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->safeEmail(),
            'portfolio'=>$this->faker->url(),
            'github'=>$this->faker->url(),
            'cv'=>$this->faker->url(),
            'mobilityzone'=> 'None',
        ];
    }
}
