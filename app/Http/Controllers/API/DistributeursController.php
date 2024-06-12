<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Distributeurs;
use Illuminate\Http\Request;

class DistributeursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $distributeurs = Distributeurs::all();
        return response()->json($distributeurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'id_client' => 'required|exists:clients,id_client',
        ]);

        $distributeur = Distributeurs::create($validatedData);

        if ($distributeur) {
            return response()->json($distributeur, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création du distributeur'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $distributeur = Distributeurs::find($id);
        if ($distributeur) {
            return response()->json($distributeur);
        } else {
            return response()->json(['message' => 'Distributeur non trouvé'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $distributeur = Distributeurs::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'adresse' => 'sometimes|string|max:255',
            'telephone' => 'sometimes|string|max:20',
            'id_client' => 'sometimes|exists:clients,id_client',
        ]);

        $distributeur->update($validatedData);
        return response()->json($distributeur, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleted = Distributeurs::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Distributeur non trouvé'], 404);
        }
    }
}
