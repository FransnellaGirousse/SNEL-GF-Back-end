<?php

namespace App\Http\Controllers;

use App\Models\MissionReport;
use Illuminate\Http\Request;

class MissionReportController extends Controller
{
    // Créer un nouveau rapport de mission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'mission_location' => 'required|string|max:255',
            'mission_objectives' => 'required|string',
            'name_of_missionary' => 'required|string|max:255',
            'next_steps' => 'required|string',
            'object' => 'required|string',
            'point_to_improve' => 'required|string',
            'progress_of_activities' => 'required|string',
            'recommendations' => 'required|string',
            'strong_points' => 'required|string',
        ]);

        $missionReport = MissionReport::create($validatedData);

        return response()->json([
            'message' => 'Rapport de mission créé avec succès',
            'mission_report' => $missionReport
        ], 201);
    }

    // Obtenir tous les rapports de mission
    public function index()
    {
        $missionReports = MissionReport::all();
        return response()->json($missionReports, 200);
    }

    // Obtenir un rapport de mission par ID
    public function show($id)
    {
        $missionReport = MissionReport::find($id);

        if (!$missionReport) {
            return response()->json(['message' => 'Rapport de mission non trouvé'], 404);
        }

        return response()->json($missionReport, 200);
    }

    // Mettre à jour un rapport de mission
    public function update(Request $request, $id)
    {
        $missionReport = MissionReport::find($id);

        if (!$missionReport) {
            return response()->json(['message' => 'Rapport de mission non trouvé'], 404);
        }

        $validatedData = $request->validate([
            'date' => 'required|date',
            'mission_location' => 'required|string|max:255',
            'mission_objectives' => 'required|string',
            'name_of_missionary' => 'required|string|max:255',
            'next_steps' => 'required|string',
            'object' => 'required|string',
            'point_to_improve' => 'required|string',
            'progress_of_activities' => 'required|string',
            'recommendations' => 'required|string',
            'strong_points' => 'required|string',
        ]);

        $missionReport->update($validatedData);

        return response()->json([
            'message' => 'Rapport de mission mis à jour avec succès',
            'mission_report' => $missionReport
        ], 200);
    }

    // Supprimer un rapport de mission
    public function destroy($id)
    {
        $missionReport = MissionReport::find($id);

        if (!$missionReport) {
            return response()->json(['message' => 'Rapport de mission non trouvé'], 404);
        }

        $missionReport->delete();

        return response()->json(['message' => 'Rapport de mission supprimé avec succès'], 200);
    }
}
