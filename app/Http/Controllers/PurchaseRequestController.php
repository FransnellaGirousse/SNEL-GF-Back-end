<?php

namespace App\Http\Controllers;

use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $purchaseRequests = PurchaseRequest::all();
        return response()->json($purchaseRequests, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'estimated_total' => 'required|numeric',
            'estimated_unit_price' => 'required|numeric',
            'geo_code' => 'required|string',
            'item' => 'required|string',
            'notes' => 'nullable|string',
            'project_code' => 'required|string',
            'quantity' => 'required|integer',
            'unit_type' => 'required|string',
        ]);

        $purchaseRequest = PurchaseRequest::create($validatedData);

        return response()->json([
            'message' => 'Demande d\'achat créée avec succès',
            'purchase_request' => $purchaseRequest
        ], 201);
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
            'description' => 'required|string',
            'estimated_total' => 'required|numeric',
            'estimated_unit_price' => 'required|numeric',
            'geo_code' => 'required|string',
            'item' => 'required|string',
            'notes' => 'nullable|string',
            'project_code' => 'required|string',
            'quantity' => 'required|integer',
            'unit_type' => 'required|string',
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
