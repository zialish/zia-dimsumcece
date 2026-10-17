<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description'  => 'nullable',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'status'       => 'required|in:Available,Unavailable',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only([
            'product_name',
            'description',
            'price',
            'stock',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required',
            'description'  => 'nullable',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'status'       => 'required|in:Available,Unavailable',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $product = Product::findOrFail($id);

        $data = $request->only([
            'product_name',
            'description',
            'price',
            'stock',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
