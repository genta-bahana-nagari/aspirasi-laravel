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
            $aspirations = Aspiration::with(['user', 'category'])
                ->latest()
                ->get();
        } else {
            $aspirations = Aspiration::with('category')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('aspirations.index', compact('aspirations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Aspiration::create([
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => 'Terkirim'
        ]);

        return redirect()
            ->route('aspirations.index')
            ->with('success', 'Aspirasi berhasil dikirim');

    }

    public function show(Aspiration $aspiration)
    {
        return view('aspirations.show', compact('aspiration'));
    }

    public function update(Request $request, Aspiration $aspiration)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

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
        $user = Auth::user();

        if (! $aspiration->canBeDeletedBy($user)) {
            return redirect()
                ->route('aspirations.index')
                ->with('error', 'Aspirasi tidak dapat dihapus');
        }

        $aspiration->delete();

        return redirect()
            ->route('aspirations.index')
            ->with('success', 'Aspirasi berhasil dihapus');
    }
}
