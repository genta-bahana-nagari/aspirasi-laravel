<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /**
         * =========================
         * Dashboard Siswa
         * =========================
         */
        if ($user->role === 'student') {

            $aspirationsQuery = Aspiration::where('user_id', $user->id);

            return view('dashboard.student', [
                'totalAspirations' => (clone $aspirationsQuery)->count(),
                'sentAspirations' => (clone $aspirationsQuery)
                    ->where('status', 'Terkirim')
                    ->count(),
                'processedAspirations' => (clone $aspirationsQuery)
                    ->where('status', 'Diproses')
                    ->count(),
                'finishedAspirations' => (clone $aspirationsQuery)
                    ->where('status', 'Selesai')
                    ->count(),
                'latestAspirations' => Aspiration::with('category')
                    ->where('user_id', $user->id)
                    ->latest()
                    ->take(5)
                    ->get(),
            ]);
        }

        /**
         * =========================
         * Dashboard Admin
         * =========================
         */
        return view('dashboard.admin', [
            // Kartu ringkasan
            'totalStudents' => User::where('role', 'student')->count(),
            'totalCategories' => Category::count(),
            'pendingAspirations' => Aspiration::where('status', 'Terkirim')->count(),

            // Tabel aspirasi terbaru
            'latestAspirations' => Aspiration::with(['user', 'category'])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
