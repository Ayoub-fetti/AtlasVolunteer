<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use App\Models\Opportunity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'profile_picture',
        'cover',
        'skills',
        'interests',
        'total_hours',
        'available',
    ];
    protected $casts = [
            'date_of_birth' => 'date',
            'available' => 'boolean',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'volunteer_profiles';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class, 'applications');
    }
}
