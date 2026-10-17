
@extends('layouts.admin')

@section('title', 'Edit Produk | Dimsum Cece')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="fs-3">Edit Produk</h1>
        <p class="text-secondary">Perbarui informasi produk Dimsum Cece.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input kamu:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Produk</h3>
        </div>

        <form action="{{ route('products.update', $product->product_id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Produk</label>
                    <input type="text" name="product_name" id="product_name"
                           class="form-control @error('product_name') is-invalid @enderror"
                           value="{{ old('product_name', $product->product_name) }}" required>
                    @error('product_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Produk</label>

                    @if ($product->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->product_name }}"
                                 width="120" height="120"
                                 style="object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif

                    <input type="file" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-secondary">Pilih foto baru jika ingin mengganti foto lama. Maksimal 5 MB.</small>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" id="price" min="0" step="0.01"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock" min="0"
                           class="form-control @error('stock') is-invalid @enderror"
                           value="{{ old('stock', $product->stock) }}" required>
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status"
                            class="form-select @error('status') is-invalid @enderror" required>
                        <option value="Available"
                            {{ old('status', $product->status) == 'Available' ? 'selected' : '' }}>
                            Available
                        </option>
                        <option value="Unavailable"
                            {{ old('status', $product->status) == 'Unavailable' ? 'selected' : '' }}>
                            Unavailable
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
