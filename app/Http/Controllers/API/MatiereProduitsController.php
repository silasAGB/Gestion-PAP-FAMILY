<?php

namespace App\Http\Controllers\API;

use App\Models\MatiereProduit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MatiereProduit::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_MP' => 'required|exists:matiere_premieres,id_MP',
            'id_produit' => 'required|exists:produits,id_produit',
            'qte' => 'required|integer|min:1',
        ]);

        $matiereProduit = MatiereProduit::create($validatedData);

        if ($matiereProduit) {
            return response()->json($matiereProduit, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de la relation matière-produit'], 500);
        }
    }

    // Ajoutez ici les autres méthodes du contrôleur selon vos besoins
}
