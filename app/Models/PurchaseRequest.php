<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_costs',
        'daily_rating_coefficient',
        'date',
        'informations',
        'per_diem_rate',
        'percentage_of_advance_required',
        'signature',
        'total_amount',
    ];
}
