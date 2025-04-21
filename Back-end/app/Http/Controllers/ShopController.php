<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = $request->input('categories', []);
        $query = Product::query();

        if (!empty($categories)) {
            $query->whereIn('category', $categories);
        }

        $products = $query->get();
        $allCategories = Product::distinct()->pluck('category');
        return view('shop', compact('products', 'allCategories'));
    }
}
