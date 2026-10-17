
@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h3>Tambah Kategori</h3>
        <p class="text-secondary">Tambahkan kategori baru untuk Dimsum Cece.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Kategori</h3>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="mb-3">
                    <label for="category_name" class="form-label">Nama Kategori</label>
                    <input
                        type="text"
                        name="category_name"
                        id="category_name"
                        class="form-control @error('category_name') is-invalid @enderror"
                        value="{{ old('category_name') }}"
                        placeholder="Contoh: Dimsum Kukus"
                        required
                    >
                    @error('category_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Masukkan deskripsi kategori"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Status --</option>
                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Kategori
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
