<?php

namespace App\Http\Controllers;

use App\Models\RequestInAdvance;
use Illuminate\Http\Request;

class RequestInAdvanceController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'additional_costs' => 'required|string',
            'daily_rating_coefficient' => 'required|string',
            'date' => 'required|date',
            'informations' => 'required|string',
            'per_diem_rate' => 'required|string',
            'percentage_of_advance_required' => 'required|string',
            'signature' => 'required|string',
            'total_amount' => 'required|string',
        ]);

        // Créer une nouvelle entrée
        $requestInAdvance = RequestInAdvance::create($validatedData);

        return response()->json([
            'message' => 'Demande d\'avance créée avec succès',
            'request_in_advance' => $requestInAdvance
        ], 201);
    }

    public function index()
    {
        $requestsInAdvance = RequestInAdvance::all();
        return response()->json($requestsInAdvance, 200);
    }

    public function show($id)
    {
        $requestInAdvance = RequestInAdvance::find($id);

        if (!$requestInAdvance) {
            return response()->json(['message' => 'Demande d\'avance non trouvée'], 404);
        }

        return response()->json($requestInAdvance, 200);
    }

    public function update(Request $request, $id)
    {
        $requestInAdvance = RequestInAdvance::find($id);

        if (!$requestInAdvance) {
            return response()->json(['message' => 'Demande d\'avance non trouvée'], 404);
        }

        $validatedData = $request->validate([
            'additional_costs' => 'required|string',
            'daily_rating_coefficient' => 'required|string',
            'date' => 'required|date',
            'informations' => 'required|string',
            'per_diem_rate' => 'required|string',
            'percentage_of_advance_required' => 'required|string',
            'signature' => 'required|string',
            'total_amount' => 'required|string',
        ]);

        $requestInAdvance->update($validatedData);

        return response()->json([
            'message' => 'Demande d\'avance mise à jour avec succès',
            'request_in_advance' => $requestInAdvance
        ], 200);
    }

    public function destroy($id)
    {
        $requestInAdvance = RequestInAdvance::find($id);

        if (!$requestInAdvance) {
            return response()->json(['message' => 'Demande d\'avance non trouvée'], 404);
        }

        $requestInAdvance->delete();

        return response()->json(['message' => 'Demande d\'avance supprimée avec succès'], 200);
    }
}
