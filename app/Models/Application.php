<?php

namespace App\Models;
use App\Models\Opportunity;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'motivation',
        'status',
        'hours_served',
        'approved_at',
        'completed_at',
    ];

    public function Opportunity(){
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
