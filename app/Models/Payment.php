<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        // Add other fields as necessary
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
