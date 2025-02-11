<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'account_number' => $this->faker->unique()->numerify('###########'),
            'balance' => $this->faker->randomFloat(2, 1000, 10000), // Random balance between 1000 and 10000
        ];
    }
}
