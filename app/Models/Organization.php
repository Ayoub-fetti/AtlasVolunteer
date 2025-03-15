<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'organization_name',
        'description',
        'organization_type',
        'website',
        'logo',
        'cover'

    ];
}
