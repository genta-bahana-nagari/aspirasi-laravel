<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Dashboard Admin
        if ($user->isAdmin()) {
            return view('dashboard.admin', [
                'totalAspirations' => Aspiration::count(),
                'processed'        => Aspiration::where('status', 'Diproses')->count(),
                'finished'         => Aspiration::where('status', 'Selesai')->count(),
                'categories'       => Category::count(),
            ]);
        }

        // Dashboard Student
        return view('dashboard.student', [
            'totalAspirations' => Aspiration::where('user_id', $user->id)->count(),
            'latestAspirations'=> Aspiration::where('user_id', $user->id)
                                        ->latest()
                                        ->take(5)
                                        ->get(),
        ]);
    }
}
