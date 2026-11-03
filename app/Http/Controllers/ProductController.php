<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin(
                'categories',
                'products.category_id',
                '=',
                'categories.category_id'
            )
            ->select('products.*', 'categories.category_name')
            ->orderBy('products.product_id', 'desc')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('categories')
            ->where('status', 'Active')
            ->orderBy('category_name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category_id'  => 'required|exists:categories,category_id',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'status'       => 'required|in:Available,Unavailable',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only([
            'product_name',
            'description',
            'category_id',
            'price',
            'stock',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('products')->insert($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $product = DB::table('products')
            ->where('product_id', $id)
            ->first();

        abort_if(!$product, 404);

        $categories = DB::table('categories')
            ->where('status', 'Active')
            ->orderBy('category_name')
            ->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category_id'  => 'required|exists:categories,category_id',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'status'       => 'required|in:Available,Unavailable',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $product = DB::table('products')
            ->where('product_id', $id)
            ->first();

        abort_if(!$product, 404);

        $data = $request->only([
            'product_name',
            'description',
            'category_id',
            'price',
            'stock',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $data['updated_at'] = now();

        DB::table('products')
            ->where('product_id', $id)
            ->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = DB::table('products')
            ->where('product_id', $id)
            ->first();

        abort_if(!$product, 404);

        DB::table('products')
            ->where('product_id', $id)
            ->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
