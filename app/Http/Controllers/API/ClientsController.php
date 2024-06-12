<?php

namespace App\Http\Controllers\API;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Clients::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_client' => 'required|string',
            'contact_client' => 'required|string',
            'adresse_client' => 'required|string',
        ]);

        $client = Clients::create($validatedData);

        if ($client) {
            return response()->json($client, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création du client'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Clients::find($id);
        if ($client) {
            return response()->json($client);
        } else {
            return response()->json(['message' => 'Client non trouvé'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Clients::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Client non trouvé'], 404);
        }
    }
}
