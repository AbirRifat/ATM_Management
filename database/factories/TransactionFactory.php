<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'account_id' => Account::factory(),
            'transaction_type' => $this->faker->randomElement(['withdrawal', 'deposit', 'transfer', 'debit', 'credit']),
            'amount' => $this->faker->randomFloat(2, 50, 5000), // Random amount between 50 and 5000
        ];
    }
}
