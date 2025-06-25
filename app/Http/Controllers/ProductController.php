<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Artisan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('artisan');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('category', $category);
        }

        if ($request->has('price_min')) {
            $priceMin = $request->input('price_min');
            $query->where('price', '>=', $priceMin);
        }

        if ($request->has('price_max')) {
            $priceMax = $request->input('price_max');
            $query->where('price', '<=', $priceMax);
        }

        if ($request->has('location')) {
            $location = $request->input('location');
            $query->where('location', $location);
        }

        if ($request->has('artisan_id')) {
            $artisanId = $request->input('artisan_id');
            $query->where('artisan_id', $artisanId);
        }

        $products = $query->paginate(12); // Paginate with 12 products per page

        $categories = Product::distinct('category')->pluck('category');
        $locations = Product::distinct('location')->pluck('location');
        $artisans = Artisan::select('id', 'name')->get();

        return Inertia::render('Products/Index', [
            'products' => $products,
            'filters' => $request->only(['search', 'category', 'price_min', 'price_max', 'location', 'artisan_id']),
            'categories' => $categories,
            'locations' => $locations,
            'artisansList' => $artisans, // Renamed to avoid conflict with `artisans` prop from Artisan Directory
        ]);
    }
}
