<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $todos = auth()->user()->todos()
            ->whereDate('due_date', Carbon::today())
            ->get();

        return Inertia::render('Dashboard', [
            'todos' => $todos,
        ]);
    }
}
