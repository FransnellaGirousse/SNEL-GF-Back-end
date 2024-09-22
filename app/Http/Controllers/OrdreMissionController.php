<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Models\OrdreMission;
use App\Models\Tdr;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\OmSubmittedNotification;
use App\Notifications\OmValidateByDirecteurNotification;


class OrdreMissionController extends Controller
{

    public function create(Request $request, Tdr $tdr)
    {
            if ($tdr->etat !== 'validé_par_directeur') {
                return redirect()->back()->with('error', 'Le TDR doit être validé avant de créer l’OM.');
            }

            $om = new OrdreMission();
            $om->tdr_id = $tdr->id;
            $om->date_depart = $request->input('date_depart');
            $om->origine = $request->input('origine');
            $om->destination = $request->input('destination');
            $om->fund = $request->input('fund');
            $om->price = $request->input('price');
            $om->mode_travel = $request->input('mode_travel');
            $om->hotel_details = $request->input('hotel_details');
            $om->etat = 'soumis';
            $om->save();

            // Notification au manager pour validation de l'OM
            $manager = User::find($tdr->missionnaire->manager_id);
            Notification::send($manager, new OmSubmittedNotification($om));

            return redirect()->back()->with('success', 'Ordre de Mission créé et soumis pour validation.');
    }


    public function  validateByDirecteur(OrdreMission $tdr)
    {
        $tdr->etat = 'Validé_par_Directeur';
        $tdr->save();   

        $missionaire = User::find($tdr->missionaire);
        Notification::send($missionaire, new OmValidateByDirecteurNotification($tdr));

        return redirect()->back()->with('success', 'Ordre de Mission validé par le directeur.');
    }

}
