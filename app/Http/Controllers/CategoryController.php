<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\ReturnFactory;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);
    }

    public function show(Category $category)
    {
        return $category;
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $category->update($request->only('name'));

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
