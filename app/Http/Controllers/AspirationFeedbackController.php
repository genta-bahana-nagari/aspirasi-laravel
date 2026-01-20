<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\AspirationFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirationFeedbackController extends Controller
{
    public function store(Request $request, Aspiration $aspiration)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'feedback' => 'required|string',
        ]);

        return AspirationFeedback::create([
            'aspiration_id' => $aspiration->id,
            'admin_id'      => Auth::id(),
            'title'         => $request->title,
            'feedback'      => $request->feedback,
        ]);
    }

    public function destroy(AspirationFeedback $aspirationFeedback)
    {
        $aspirationFeedback->delete();

        return response()->json([
            'message' => 'Feedback dihapus'
        ]);
    }
}
