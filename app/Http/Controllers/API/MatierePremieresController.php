<?php

namespace App\Http\Controllers\API;

use App\Models\MatierePremieres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatierePremieresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MatierePremieres::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_MP' => 'required|string|max:255',
            'prix_achat' => 'required|numeric',
            'qte_stock' => 'required|integer',
            'seuil_stock' => 'required|integer',
            'unite' => 'required|integer',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        $matierePremiere = MatierePremieres::create($validatedData);

        if ($matierePremiere) {
            return response()->json($matierePremiere, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de la matière première'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matierePremiere = MatierePremieres::find($id);
        if ($matierePremiere) {
            return response()->json($matierePremiere);
        } else {
            return response()->json(['message' => 'Matière première non trouvée'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = MatierePremieres::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Matière première non trouvée'], 404);
        }
    }
}
