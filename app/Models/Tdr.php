<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdr extends Model
{
    use HasFactory;

    // Les champs que l'on peut remplir
    protected $fillable = [
        'mission_objectives',
        'planned_activities',
        'necessary_resources',
    ];
    // // Constantes pour les états  
    // const ETAT_SOUMIS = 'soumis';  
    // const ETAT_VALIDE_PAR_MANAGER = 'validé_par_manager';  
    // const ETAT_VALIDE_PAR_DIRECTEUR = 'validé_par_directeur';  

    // // Liste des états  
    // const ETATS = [  
    //     self::ETAT_SOUMIS,  
    //     self::ETAT_VALIDE_PAR_MANAGER,  
    //     self::ETAT_VALIDE_PAR_DIRECTEUR,  
    // ];  

    // Relation avec le modèle User  
    // public function missionnaire()  
    // {  
    //     return $this->belongsTo(User::class, 'missionnaire_id');  
    // }  

}
