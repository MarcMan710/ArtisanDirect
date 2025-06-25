<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArtisanController extends Controller
{
    public function index(Request $request)
    {
        $query = Artisan::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($request->has('location')) {
            $location = $request->input('location');
            $query->where('location', $location);
        }

        if ($request->has('food_category')) {
            $foodCategory = $request->input('food_category');
            $query->where('food_category', $foodCategory);
        }

        $artisans = $query->paginate(10); // Paginate with 10 artisans per page

        return Inertia::render('Artisans/Index', [
            'artisans' => $artisans,
            'filters' => $request->only(['search', 'location', 'food_category']),
        ]);
    }
}
