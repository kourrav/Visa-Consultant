<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'status',
        // Add other fields as necessary
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
