<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with('category')->get();
            if ($products === null) {
                throw new \Exception('Failed to fetch products');
            }
            return view('admin.product.index', compact('products'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to fetch products');
        }
    }
}
