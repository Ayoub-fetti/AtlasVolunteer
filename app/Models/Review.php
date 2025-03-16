<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'rating',
        'comment',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
