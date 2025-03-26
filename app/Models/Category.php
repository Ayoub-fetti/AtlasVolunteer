<?php

namespace App\Models;
use App\Models\Opportunity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];
    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class);
    }
}
