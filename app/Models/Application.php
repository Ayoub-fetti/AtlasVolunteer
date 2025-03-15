<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'motivation',
        'status',
        'hours_served',
        'approved_at',
        'completed_at',
    ];
    
}
