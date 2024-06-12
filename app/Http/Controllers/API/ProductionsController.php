<?php

namespace App\Http\Controllers\API;

use App\Models\Productions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductionsController extends Controller
{
    /**
     * Affiche une liste des productions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = Productions::all();
        return response()->json($productions);
    }

    /**
     * Enregistre une nouvelle production.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_prevue' => 'required|date',
            'date_production' => 'required|date',
            'qte_prevue' => 'required|integer',
            'qte_produite' => 'required|integer',
            'statut' => 'required|string',
            'id_produit' => 'required|exists:produits,id_produit',
        ]);

        $production = Productions::create($validatedData);

        return response()->json($production, 201);
    }

    /**
     * Affiche la production spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production = Productions::findOrFail($id);
        return response()->json($production);
    }

    /**
     * Met à jour la production spécifiée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $production = Productions::findOrFail($id);

        $validatedData = $request->validate([
            'date_prevue' => 'sometimes|date',
            'date_production' => 'sometimes|date',
            'qte_prevue' => 'sometimes|integer',
            'qte_produite' => 'sometimes|integer',
            'statut' => 'sometimes|string',
            'id_produit' => 'sometimes|exists:produits,id_produit',
        ]);

        $production->update($validatedData);

        return response()->json($production, 200);
    }

    /**
     * Supprime la production spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Productions::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
