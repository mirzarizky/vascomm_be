<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $categoryId = $request->input('category');

        $categoryExists = false;
        if (!empty($categoryId)) {
            $categoryExists = ProductCategory::where('id', $categoryId)->exists();
        }
        $cacheKey = 'products' . ($categoryExists ? '-' . $categoryId : null);

        $products = Cache::remember(
            $cacheKey,
            now()->addHour(),
            function () use ($categoryId) {
                return Product::when($categoryId, function ($query, $categoryId) {
                    return $query->where('category_id', $categoryId);
                })
            ->get(['id', 'title', 'price']);
            }
        );

        $categories = Cache::remember('categories', now()->addHour(), function () {
            return ProductCategory::all();
        });

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'categoryId' => $categoryId
        ]);
    }
}
