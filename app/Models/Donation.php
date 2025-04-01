<?php

namespace App\Models;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\Organization;
use App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location_id',
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
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
