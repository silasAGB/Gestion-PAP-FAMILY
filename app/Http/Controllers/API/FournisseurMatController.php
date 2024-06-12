<?php

namespace App\Http\Controllers\API;

use App\Models\FournisseurMat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseurMatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FournisseurMat::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur',
            'id_MP' => 'required|exists:matiere_premieres,id_MP',
        ]);

        $fournisseurMat = FournisseurMat::create($validatedData);

        if ($fournisseurMat) {
            return response()->json($fournisseurMat, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de la relation fournisseur-matière première'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fournisseurMat = FournisseurMat::find($id);
        if ($fournisseurMat) {
            return response()->json($fournisseurMat);
        } else {
            return response()->json(['message' => 'Relation fournisseur-matière première non trouvée'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = FournisseurMat::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Relation fournisseur-matière première non trouvée'], 404);
        }
    }
}
