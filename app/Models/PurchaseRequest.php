<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;

    protected $table = 'purchase_request';

    protected $fillable = [
        'description',
        'estimated_total',
        'estimated_unit_price',
        'geo_code',
        'item',
        'notes',
        'project_code',
        'quantity',
        'unit_type',
    ];
}
