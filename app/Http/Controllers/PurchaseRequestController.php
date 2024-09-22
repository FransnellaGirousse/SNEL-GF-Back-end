<?php

namespace App\Http\Controllers;

use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'additional_costs' => 'required|string|max:255',
            'daily_rating_coefficient' => 'required|string|max:255',
            'date' => 'required|date',
            'informations' => 'required|string',
            'per_diem_rate' => 'required|string|max:255',
            'percentage_of_advance_required' => 'required|string|max:255',
            'signature' => 'required|string|max:255',
            'total_amount' => 'required|string|max:255',
        ]);

        $purchaseRequest = PurchaseRequest::create($validatedData);

        return response()->json([
            'message' => 'Demande d\'achat créée avec succès',
            'purchase_request' => $purchaseRequest
        ], 201);
    }

    public function index()
    {
        $purchaseRequests = PurchaseRequest::all();
        return response()->json($purchaseRequests, 200);
    }

    public function show($id)
    {
        $purchaseRequest = PurchaseRequest::find($id);

        if (!$purchaseRequest) {
            return response()->json(['message' => 'Demande d\'achat non trouvée'], 404);
        }

        return response()->json($purchaseRequest, 200);
    }

    public function update(Request $request, $id)
    {
        $purchaseRequest = PurchaseRequest::find($id);

        if (!$purchaseRequest) {
            return response()->json(['message' => 'Demande d\'achat non trouvée'], 404);
        }

        $validatedData = $request->validate([
            'additional_costs' => 'required|string|max:255',
            'daily_rating_coefficient' => 'required|string|max:255',
            'date' => 'required|date',
            'informations' => 'required|string',
            'per_diem_rate' => 'required|string|max:255',
            'percentage_of_advance_required' => 'required|string|max:255',
            'signature' => 'required|string|max:255',
            'total_amount' => 'required|string|max:255',
        ]);

        $purchaseRequest->update($validatedData);

        return response()->json([
            'message' => 'Demande d\'achat mise à jour avec succès',
            'purchase_request' => $purchaseRequest
        ], 200);
    }

    public function destroy($id)
    {
        $purchaseRequest = PurchaseRequest::find($id);

        if (!$purchaseRequest) {
            return response()->json(['message' => 'Demande d\'achat non trouvée'], 404);
        }

        $purchaseRequest->delete();

        return response()->json(['message' => 'Demande d\'achat supprimée avec succès'], 200);
    }
}
