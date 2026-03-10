<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livre::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'string|required|max:255',
            'auteur' => 'string|required|max:255',
            'category_id' => 'integer|required',
        ]);

        $livre = Livre::create($data);

        return response()->json($livre);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $titre)
    {
        $livre = Livre::where('titre', $titre)->get();
        return $livre;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
