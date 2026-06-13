<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User; // Tetap import untuk mengecek data riil
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Homepage - show hero, categories, and featured products.
     */
    public function index()
    {
        // 1. Ambil Kategori beserta hitungan jumlah produk di dalamnya
        $categories = Category::withCount('products')->get();
        
        // 2. Ambil 8 Produk Terbaru yang aktif
        $products = Product::where('is_active', true)
            ->with('category')
            ->latest()
            ->take(8)
            ->get();

        // 3. Hitung Real Data dari Database
        $totalProducts = Product::where('is_active', true)->count();
        $totalCustomers = User::count(); 

        // Set ke 0 terlebih dahulu atau ambil jika ada sistem review nantinya
        $averageRating = 0; 

        return view('front.index', compact(
            'categories', 
            'products', 
            'totalProducts', 
            'totalCustomers', 
            'averageRating'
        ));
    }

    /**
     * Show single product detail.
     */
    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('front.product', compact('product', 'relatedProducts'));
    }

    /**
     * Show products by category.
     */
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('front.category', compact('category', 'products'));
    }

    /**
     * About Us page.
     */
    public function about()
    {
        return view('front.about');
    }

    /**
     * Contact page.
     */
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * Search products.
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        $products = Product::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('front.search', compact('products', 'query'));
    }
}