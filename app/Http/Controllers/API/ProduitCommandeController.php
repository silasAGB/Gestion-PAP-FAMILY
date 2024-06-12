<?php

namespace App\Http\Controllers\API;

use App\Models\ProduitCommande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduitCommandeController extends Controller
{
    public function index()
    {
        $relations = ProduitCommande::all();
        return response()->json($relations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produit' => 'required|exists:produits,id_produit',
            'id_commande' => 'required|exists:commandes,id_commande',
            'qte_produit_commande' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric|min:0',
            'montant_produit_commande' => 'required|numeric|min:0',
        ]);

        $relation = ProduitCommande::create($request->all());
        return response()->json($relation, 201);
    }

    public function show($id)
    {
        $relation = ProduitCommande::findOrFail($id);
        return response()->json($relation);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'qte_produit_commande' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric|min:0',
            'montant_produit_commande' => 'required|numeric|min:0',
        ]);

        $relation = ProduitCommande::findOrFail($id);
        $relation->update($request->all());
        return response()->json($relation, 200);
    }

    public function destroy($id)
    {
        ProduitCommande::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
