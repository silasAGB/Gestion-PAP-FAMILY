<?php

namespace App\Http\Controllers\API;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categories::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_categorie' => 'required|string|unique:categories,code_Categorie',
            'nom_categorie' => 'required|string|max:255',
        ]);

        $categorie = Categories::create($validatedData);

        if ($categorie) {
            return response()->json($categorie, 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de la catégorie'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie = Categories::find($id);
        if ($categorie) {
            return response()->json($categorie);
        } else {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Categories::destroy($id);
        if ($deleted) {
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }
}
