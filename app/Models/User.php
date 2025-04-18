<?php

namespace App\Models;

use App\Models\Volunteer;
use App\Models\Organization;
use App\Models\Review;
use App\Models\Opportunity;
use App\Models\Donation;
use App\Models\Application;
use App\Models\Conversation;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'role',
        'bio',
        'function',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
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
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'user_id');
    }
    public function receivedConversations()
    {
        return $this->hasMany(Conversation::class, 'receiver_id');
    }
    public function hasRole($role){
        return $this->role == $role;
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }
}
