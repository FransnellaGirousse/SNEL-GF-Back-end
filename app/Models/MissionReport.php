<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'mission_location',
        'mission_objectives',
        'name_of_missionary',
        'next_steps',
        'object',
        'point_to_improve',
        'progress_of_activities',
        'recommendations',
        'strong_points',
    ];
}
