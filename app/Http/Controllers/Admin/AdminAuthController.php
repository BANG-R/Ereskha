<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form.
     */
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Process admin login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Hardcoded admin credentials
        if ($email === 'admin@ereskha.com' && $password === 'admin123') {
            session([
                'admin_logged_in' => true,
                'admin_email' => $email,
                'admin_name' => 'Administrator',
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil! Selamat datang.');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email', 'admin_name']);

        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }

    /**
     * Admin dashboard with stats.
     */
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $activeProducts = Product::where('is_active', true)->count();
        $latestProducts = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'activeProducts', 'latestProducts'));
    }
}
