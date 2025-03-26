<?php

namespace App\Models;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = [
        'place_name',
        'longitude',
        'latitude',
    ];
    public function opportunity()
    {
        return $this->hasMany(Opportunity::class);
    }
}
