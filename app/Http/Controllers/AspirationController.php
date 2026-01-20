<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return Aspiration::with(['user', 'category'])->latest()->get();
        }

        return Aspiration::with('category')
            ->where('user_id', $user->id)
            ->latest()
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Aspiration::create([
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'description' => $request->description,
        ]);
    }

    public function show(Aspiration $aspiration)
    {
        return $aspiration->load(['user', 'category', 'feedbacks']);
    }

    public function update(Request $request, Aspiration $aspiration)
    {
        $request->validate([
            'status' => 'required|in:Terkirim,Diproses,Dalam Perbaikan,Selesai'
        ]);

        $aspiration->update([
            'status' => $request->status
        ]);

        return $aspiration;
    }

    public function destroy(Aspiration $aspiration)
    {
        $aspiration->delete();

        return response()->json([
            'message' => 'Aspirasi dihapus'
        ]);
    }
}
