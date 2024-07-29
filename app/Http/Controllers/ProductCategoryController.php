<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all();

        if ($productCategories === null) {
            abort(500, 'Failed to retrieve product categories');
        }

        return view('admin.productCategory.index', compact('productCategories'));
    }

    public function create()
    {
        return view('admin.productCategory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product_categories|string|max:255',
        ]);

        // Sanitasi input untuk mencegah XSS
        $sanitizedInput = htmlspecialchars($validated['name'], ENT_QUOTES, 'UTF-8');

        $productCategory = ProductCategory::create([
            'name' => $sanitizedInput,
        ]);

        if ($productCategory === null) {
            abort(500, 'Failed to create product category');
        }

        return redirect()->route('productCategory.index')->with('success', 'Product category created successfully');
    }


    public function show(ProductCategory $productCategory)
    {
        // 
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.productCategory.edit', [
            'productCategory' => $productCategory
        ]);
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required|unique:product_categories|string|max:255',
        ]);

        $data_update = [
            'name' => $request->name,
        ];

        ProductCategory::where('id', $productCategory->id)->update($data_update);

        if ($productCategory === null) {
            abort(500, 'Failed to update product category');
        }

        return redirect()->route('productCategory.index')->with('success', 'Product category updated successfully');
    }

    public function destroy($id)
    {
        ProductCategory::destroy($id);
        if ($id === null) {
            abort(500, 'Failed to delete product category');
        }
        return redirect()->route('productCategory.index')->with('success', 'Product category deleted successfully');
    }
}
