<?php

namespace Database\Factories;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PinFactory extends Factory
{
    protected $model = Pin::class;

    public function definition()
    {
        $pin = $this->faker->numerify('####'); // Generate a random 4-digit PIN

        return [
            'user_id' => User::factory(),
            'pin' => $pin,  // Hashed PIN

        ];
    }
}
