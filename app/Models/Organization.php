<?php

namespace App\Models;
use App\Models\User;
use App\Models\Review;
use App\Models\Opportunity;
use App\Models\Donation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'organization_name',
        'bio',
        'organization_type',
        'website',
        'logo',
        'cover',
        'is_verified',
        'verified_at',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_profiles';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function opportunities()
    {
        return $this->hasOneThrough(Opportunity::class,User::class,'id','user_id','user_id');
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
