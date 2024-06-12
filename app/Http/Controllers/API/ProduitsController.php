<?php

namespace App\Http\Controllers\API;

use App\Models\Produits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produits::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference_produit' => 'required|string|unique:produits,reference_produit',
            'nom_produit' => 'required|string|max:255',
            'description_produit' => 'nullable|string',
            'prix_details_produit' => 'required|numeric',
            'prix_gros_produit' => 'required|numeric',
            'qte_preparation' => 'required|integer',
            'qte_stock' => 'required|integer',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        $produit = Produits::create($validatedData);

        if ($produit) {
            return response()->json($produit, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création du produit'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Produits::find($id);
        if ($produit) {
            return response()->json($produit);
        } else {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Produits::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }
    }
}
