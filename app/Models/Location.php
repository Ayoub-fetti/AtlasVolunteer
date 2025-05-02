<?php

namespace App\Models;
use App\Models\Opportunity;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = [
        'place_name',
    ];
    public function opportunity()
    {
        return $this->hasMany(Opportunity::class);
    }
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
}
