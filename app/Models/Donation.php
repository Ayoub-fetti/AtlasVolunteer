<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'city',
        'image',
        'status',
        'recipient_id',
        'reserved_at',
        'completed_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
