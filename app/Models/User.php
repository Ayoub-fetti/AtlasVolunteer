<?php

namespace App\Models;

use App\Models\Volunteer;
use App\Models\Organization;
use App\Models\Review;
use App\Models\Opportunity;
use App\Models\Donation;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'role',
        'bio',
        'function',
        'adress',
        'city',
        'state',
        'zip',
        'country',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
    public function volunteer()
    {
        return $this->hasOne(Volunteer::class);
    }
    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(Opportunity::class, 'favorites');
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
