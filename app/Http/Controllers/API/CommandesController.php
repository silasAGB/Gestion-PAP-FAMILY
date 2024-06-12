<?php

namespace App\Http\Controllers\API;

use App\Models\Commandes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Commandes::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference_commande' => 'required|string|unique:commandes,reference_commande',
            'date_commande' => 'required|date',
            'montant' => 'required|numeric',
            'statut' => 'required|string',
            'adresse_livraison' => 'required|string',
            'date_livraison' => 'required|date',
            'id_client' => 'required|exists:clients,id_client',
        ]);

        $commande = Commandes::create($validatedData);

        if ($commande) {
            return response()->json($commande, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de la commande'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $commande = Commandes::find($id);
        if ($commande) {
            return response()->json($commande);
        } else {
            return response()->json(['message' => 'Commande non trouvée'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Commandes::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Commande non trouvée'], 404);
        }
    }
}
