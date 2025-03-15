<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'cover',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'city',
        'state',
        'country',
        'required_volunteers',
        'registered_volunteers',
        'is_remote',
        'status',
    ];
}
