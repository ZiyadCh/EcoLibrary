<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * @return Collection<int,Livre>
     */
    public function index()
    {
        return Livre::all();
    }
    /**
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'string|required|max:255',
            'auteur' => 'string|required|max:255',
            'category_id' => 'integer|required|exists:categories,id',
        ]);

        $livre = Livre::create($data);

        return response()->json($livre, 201);
    }

    public function show($id)
    {
        return Livre::findOrFail($id);
    }

    public function findByTitre($titre)
    {
        return Livre::where('titre', $titre)->first();
    }
    /**
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $livre = Livre::findOrFail($id);

        $data = $request->validate([
            'titre' => 'string|sometimes|max:255',
            'auteur' => 'string|sometimes|max:255',
            'category_id' => 'integer|sometimes|exists:categories,id',
        ]);

        $livre->update($data);

        return response()->json($livre);
    }
    /**
     * @return JsonResponse
     */
    public function destroy(string $id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return response()->json(['message' => 'Livre deleted successfully'], 200);
    }
}
