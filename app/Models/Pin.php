<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pin'];

    // Relationship with User (Inverse of One-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
