@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Data Ulasan Produk</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">
        Tambah Ulasan
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $review->customer_name }}</td>
                    <td>{{ $review->product->product_name ?? '-' }}</td>
                    <td>{{ $review->rating }}/5</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $review->review_id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('reviews.destroy', $review->review_id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus ulasan ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada ulasan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
