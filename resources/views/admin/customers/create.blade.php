
@extends('layouts.admin')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h3>Tambah Pelanggan</h3>
        <p class="text-secondary">Tambahkan data pelanggan baru.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pelanggan</h3>
        </div>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" name="first_name" id="first_name"
                               class="form-control @error('first_name') is-invalid @enderror"
                               value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" name="last_name" id="last_name"
                               class="form-control @error('last_name') is-invalid @enderror"
                               value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="address" rows="3"
                              class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Pelanggan
                </button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
