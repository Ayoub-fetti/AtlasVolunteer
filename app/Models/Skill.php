<?php

namespace App\Models;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }
}
