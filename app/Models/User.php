<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Relationship with Account (One-to-One)
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    // Relationship with Pin (One-to-One)
    public function pin()
    {
        return $this->hasOne(Pin::class);
    }
}
