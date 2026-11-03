@extends('layouts.guest.app')

@section('content')
<div class="container py-4">
    <h2>Tambah Ulasan Produk</h2>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="customer_name"
                   class="form-control" value="{{ old('customer_name') }}" required>
            @error('customer_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="product_id" class="form-select" required>
                <option value="">Pilih Produk</option>
                @foreach ($products as $product)
                    <option value="{{ $product->product_id }}"
                        {{ old('product_id') == $product->product_id ? 'selected' : '' }}>
                        {{ $product->product_name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label>
            <select name="rating" class="form-select" required>
                <option value="">Pilih Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}"
                        {{ old('rating') == $i ? 'selected' : '' }}>
                        {{ $i }} / 5
                    </option>
                @endfor
            </select>
            @error('rating')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="comment" class="form-control" rows="4"
                      required>{{ old('comment') }}</textarea>
            @error('comment')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
