<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Pin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create()->each(function ($user) {
            // For each user, create 1 account
            $account = Account::factory()->create(['user_id' => $user->id]);

            // Create 5 transactions for each account
            Transaction::factory(5)->create(['account_id' => $account->id]);

            // Create 1 pin for each user
            Pin::factory()->create(['user_id' => $user->id]);
        });
    }
}

