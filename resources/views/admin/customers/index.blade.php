
@extends('layouts.admin')

@section('title', 'Data Pelanggan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Pelanggan</h3>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Pelanggan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pelanggan</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address ?? '-' }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('customers.edit', $customer->customer_id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('customers.destroy', $customer->customer_id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada data pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
