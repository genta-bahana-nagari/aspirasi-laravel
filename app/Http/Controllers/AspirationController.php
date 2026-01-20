<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
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

        $latestAspirations = Aspiration::with('user', 'category')
            ->latest()
            ->take(5)
            ->get();

        return view('aspirations.index', compact('aspirations'));
    }

    public function create()
    {
        $user = Auth::user();

        // hanya student bisa mengirim aspirasi
        if ($user->role !== 'student') {
            abort(403);
        }

        $categories = Category::all();
        return view('aspirations.create', compact('categories'));
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

    public function edit(Aspiration $aspiration)
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            if ($aspiration->user_id !== $user->id || $aspiration->status !== 'Terkirim') {
                abort(403);
            }
        }

        $categories = Category::all();
        return view('aspirations.edit', compact('aspiration', 'categories'));
    }


    public function update(Request $request, Aspiration $aspiration)
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            // Student hanya bisa edit miliknya sendiri & status Terkirim
            if ($aspiration->user_id !== $user->id || $aspiration->status !== 'Terkirim') {
                abort(403);
            }

            $request->validate([
                'title' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'nullable|string',
            ]);

            $aspiration->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);

        } elseif ($user->isAdmin()) {
            // Admin hanya bisa ubah status
            $request->validate([
                'status' => 'required|in:Terkirim,Diproses,Dalam Perbaikan,Selesai',
            ]);

            $aspiration->update([
                'status' => $request->status,
            ]);

        } else {
            abort(403);
        }

        return redirect()
            ->route('aspirations.index')
            ->with('success', 'Aspirasi berhasil diperbarui');
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
