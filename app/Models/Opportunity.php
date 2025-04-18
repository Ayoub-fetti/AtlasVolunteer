<?php

namespace App\Models;
use App\Models\Organization;
use App\Models\Volunteer;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
        'location_id',
        'state',
        'country',
        'required_volunteers',
        'registered_volunteers',
        'is_remote',
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class, 'applications');
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);

    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
