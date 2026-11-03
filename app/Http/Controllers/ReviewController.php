<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product', 'reply')
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::where('status', 'Available')
            ->orderBy('product_name')
            ->get();

        return view('guest.reviews.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,product_id',
            'customer_name' => 'required|string|max:255',
            'rating'        => 'required|integer|min:1|max:5',
            'comment'       => 'required|string',
        ]);

        Review::create($request->only([
            'product_id',
            'customer_name',
            'rating',
            'comment',
        ]));

        return redirect('/')
            ->with('success', 'Ulasan berhasil dikirim!');
    }
    public function edit(string $id)
    {
        $review = Review::findOrFail($id);

        $products = Product::orderBy('product_name')->get();

        return view('admin.reviews.edit', compact('review', 'products'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,product_id',
            'customer_name' => 'required|string|max:255',
            'rating'        => 'required|integer|min:1|max:5',
            'comment'       => 'required|string',
        ]);

        $review = Review::findOrFail($id);

        $review->update($request->only([
            'product_id',
            'customer_name',
            'rating',
            'comment',
        ]));

        return redirect()->route('reviews.index')
            ->with('success', 'Ulasan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Ulasan berhasil dihapus!');
    }
}
