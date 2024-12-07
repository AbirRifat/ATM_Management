<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'account_number', 'balance'];

    // Relationship with User (Inverse of One-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Transactions (One-to-Many)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
