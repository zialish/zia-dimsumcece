@extends('layouts.admin.app')

@section('content')
<div class="container py-4">
    <h2>Edit Ulasan Produk</h2>

    <form action="{{ route('reviews.update', $review->review_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="customer_name" class="form-control"
                   value="{{ old('customer_name', $review->customer_name) }}" required>
            @error('customer_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="product_id" class="form-select" required>
                @foreach ($products as $product)
                    <option value="{{ $product->product_id }}"
                        {{ old('product_id', $review->product_id) == $product->product_id ? 'selected' : '' }}>
                        {{ $product->product_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label>
            <select name="rating" class="form-select" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}"
                        {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                        {{ $i }} / 5
                    </option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="comment" class="form-control" rows="4"
                      required>{{ old('comment', $review->comment) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
