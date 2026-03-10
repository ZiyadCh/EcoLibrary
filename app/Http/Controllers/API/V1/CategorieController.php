<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * @return Collection<int,Categorie>
     */
    public function index()
    {
        return Categorie::all();
    }
    /**
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required|max:255',
        ]);

        $category = Categorie::create($data);

        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        return Categorie::findOrFail($id);
    }
    /**
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $category = Categorie::findOrFail($id);

        $data = $request->validate([
            'name' => 'string|required|max:255',
        ]);

        $category->update($data);

        return response()->json($category);
    }
    /**
     * @return JsonResponse
     */
    public function destroy(string $id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
    public function listLivres(int $id)
    {
        $category = Categorie::find($id);
        if ($category) {
            return $category->livres;
        } else {
            return "introuvable";
        }
    }
}
