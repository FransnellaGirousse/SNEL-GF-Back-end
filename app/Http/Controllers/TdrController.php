<?php

namespace App\Http\Controllers;
use App\Models\Tdr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TdrSubmittedNotification;
use App\Notifications\TdrValidatedByDirecteurNotification;
use App\Notifications\TdrValidatedByManagerNotification;



class TdrController extends Controller

{
    // Création d'une nouvelle mission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mission_objectives' => 'required|string|max:255',
            'planned_activities' => 'required|string',
            'necessary_resources' => 'required|string',
        ]);

        $mission = Tdr::create($validatedData);

        return response()->json([
            'message' => 'Mission créée avec succès',
            'mission' => $mission
        ], 201);
    }

    // Obtenir toutes les missions
    public function index()
    {
        $missions = Tdr::all();
        return response()->json($missions, 200);
    }

    // Obtenir une mission par ID
    public function show($id)
    {
        $mission = Tdr::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission non trouvée'], 404);
        }

        return response()->json($mission, 200);
    }

    // Mettre à jour une mission
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mission_objectives' => 'required|string|max:255',
            'planned_activities' => 'required|string',
            'necessary_resources' => 'required|string',
        ]);

        $mission = Tdr::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission non trouvée'], 404);
        }

        $mission->update($validatedData);

        return response()->json([
            'message' => 'Mission mise à jour avec succès',
            'mission' => $mission
        ], 200);
    }

    // Supprimer une mission
    public function destroy($id)
    {
        $mission = Tdr::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission non trouvée'], 404);
        }

        $mission->delete();

        return response()->json(['message' => 'Mission supprimée avec succès'], 200);
    }

        // public function create(Request $request)
        // {
        //     $tdr = new Tdr();
        //     $tdr->missionnaire_id = auth()->id();
        //     $tdr->objectifs = $request->input('objectifs');
        //     $tdr->activites_prevues = $request->input('activites_prevues');
        //     $tdr->ressources_necessaires = $request->input('ressources_necessaires');
        //     $tdr->etat = 'soumis';
        //     $tdr->save();

        //     // Envoi de notification au manager
        //     $manager = User::find($tdr->missionnaire->manager_id);
        //     Notification::send($manager, new TdrSubmittedNotification($tdr));

        //     return redirect()->back()->with('success', 'TDR créé et soumis pour validation.');
        // }

        // public function validateByManager(Tdr $tdr)
        // {
        //     $tdr->etat = 'validé_par_manager';
        //     $tdr->save();

        //     // Notification au directeur pour validation budgétaire
        //     $directeur = User::find($tdr->missionnaire->directeur_id);
        //     Notification::send($directeur, new TdrValidatedByManagerNotification($tdr));

        //     return redirect()->back()->with('success', 'TDR validé par le manager.');
        // }

        // public function validateByDirecteur(Tdr $tdr)
        // {
        //     $tdr->etat = 'validé_par_directeur';
        //     $tdr->save();

        //     // Notification au missionnaire que le TDR a été validé
        //     $missionnaire = User::find($tdr->missionnaire_id);
        //     Notification::send($missionnaire, new TdrValidatedByDirecteurNotification($tdr));

        //     return redirect()->back()->with('success', 'TDR validé par le directeur.');
        // }

}
