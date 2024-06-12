<?php

namespace App\Http\Controllers\API;

use App\Models\Fournisseurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Fournisseurs::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'email_fournisseur' => 'required|string|email|unique:fournisseurs,email_fournisseur',
            'contact_fournisseur' => 'required|string|max:255',
            'adresse_fournisseur' => 'required|string|max:255',
        ]);

        $fournisseur = Fournisseurs::create($validatedData);

        if ($fournisseur) {
            return response()->json($fournisseur, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création du fournisseur'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_fournisseur)
    {
        $fournisseur = Fournisseurs::find($id_fournisseur);
        if ($fournisseur) {
            return response()->json($fournisseur);
        } else {
            return response()->json(['message' => 'Fournisseur non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_fournisseur)
    {
        $fournisseur = Fournisseurs::findOrFail($id_fournisseur);

        $validatedData = $request->validate([
            'nom_fournisseur' => 'sometimes|string|max:255',
            'email_fournisseur' => 'sometimes|string|email|unique:fournisseurs,email_fournisseur,' . $id_fournisseur . ',id_fournisseur',
            'contact_fournisseur' => 'sometimes|string|max:255',
            'adresse_fournisseur' => 'sometimes|string|max:255',
        ]);

        $fournisseur->update($validatedData);
        return response()->json($fournisseur, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_fournisseur)
    {
        $deleted = Fournisseurs::destroy($id_fournisseur);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Fournisseur non trouvé'], 404);
        }
    }
}
