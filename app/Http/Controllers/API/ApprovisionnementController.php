<?php

namespace App\Http\Controllers\API;

use App\Models\Approvisionnements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovisionnementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Approvisionnements::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_approvisionnement' => 'required|date',
            'reference_approvisionnement' => 'required|string|max:255',
            'qte_approvisionnement' => 'required|integer',
            'montant' => 'required|numeric',
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur',
        ]);

        $approvisionnement = Approvisionnements::create($validatedData);

        if ($approvisionnement) {
            return response()->json($approvisionnement, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de l\'approvisionnement'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_approvisionnement)
    {
        $approvisionnement = Approvisionnements::find($id_approvisionnement);
        if ($approvisionnement) {
            return response()->json($approvisionnement);
        } else {
            return response()->json(['message' => 'Approvisionnement non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_approvisionnement)
    {
        $approvisionnement = Approvisionnements::findOrFail($id_approvisionnement);

        $validatedData = $request->validate([
            'date_approvisionnement' => 'sometimes|date',
            'reference_approvisionnement' => 'sometimes|string|max:255',
            'qte_approvisionnement' => 'sometimes|integer',
            'montant' => 'sometimes|numeric',
            'id_fournisseur' => 'sometimes|exists:fournisseurs,id_fournisseur',
        ]);

        $approvisionnement->update($validatedData);
        return response()->json($approvisionnement, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_approvisionnement)
    {
        $deleted = Approvisionnements::destroy($id_approvisionnement);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Approvisionnement non trouvé'], 404);
        }
    }
}
