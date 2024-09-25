<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInAdvance extends Model
{
    use HasFactory;
    // Spécifier le nom de la table
   protected $table = 'request_in_advance';

    // Autoriser l'assignation en masse
    protected $fillable = [
        'additional_costs',
        'daily_rating_coefficient',
        'date',
        'informations',
        'per_diem_rate',
        'percentage_of_advance_required',
        'signature',
        'total_amount'
    ];
}
