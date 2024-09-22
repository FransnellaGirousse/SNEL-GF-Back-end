<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdreMission extends Model
{

    use HasFactory;
    protected $fillable = [
        'id_tdr',
        'date_depart',
        'origine',
        'destination',
        'fund',
        'price',
        'mode_travel',
        'hotel_details',
        'etat',

    ];
    // Relation avec le modèle Tdr  
    public function tdr()  
    {  
        return $this->belongsTo(Tdr::class);  
    }  

    // Relation avec le modèle User (Missionnaire)  
    public function missionnaire()  
    {  
        return $this->belongsTo(User::class, 'missionnaire_id');  
    }  

    
}
