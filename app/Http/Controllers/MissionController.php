<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    // Création d'une nouvelle mission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mission_objectives' => 'required|string|max:255',
            'planned_activities' => 'required|string',
            'necessary_resources' => 'required|string',
        ]);

        $mission = Mission::create($validatedData);

        return response()->json([
            'message' => 'Mission créée avec succès',
            'mission' => $mission
        ], 201);
    }

    // Obtenir toutes les missions
    public function index()
    {
        $missions = Mission::all();
        return response()->json($missions, 200);
    }

    // Obtenir une mission par ID
    public function show($id)
    {
        $mission = Mission::find($id);

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

        $mission = Mission::find($id);

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
        $mission = Mission::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission non trouvée'], 404);
        }

        $mission->delete();

        return response()->json(['message' => 'Mission supprimée avec succès'], 200);
    }
}
