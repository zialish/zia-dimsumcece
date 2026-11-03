@extends('layouts.admin.app')

@section('content')
<div class="container py-4">
    <h2>Balasan Ulasan Pelanggan</h2>
    <p class="text-muted">Kelola ulasan pelanggan Dimsum Cece.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            Periksa kembali data balasan yang kamu masukkan.
        </div>
    @endif

    @forelse ($reviews as $review)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5>{{ $review->customer_name }}</h5>

                <p class="mb-1">
                    Produk: {{ $review->product_name ?? '-' }}
                </p>

                <p class="mb-1">
                    Rating: {{ $review->rating }}/5
                </p>

                <p>{{ $review->comment }}</p>

                <hr>

                @if ($review->reply_id)
                    <h6>Balasan saat ini</h6>

                    <form action="{{ route('review-replies.update', $review->reply_id) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Admin/Owner</label>
                            <input type="text" name="responder_name"
                                   class="form-control"
                                   value="{{ old('responder_name', $review->responder_name) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Balasan</label>
                            <textarea name="reply" class="form-control"
                                      rows="3" required>{{ old('reply', $review->reply) }}</textarea>
                        </div>

                        <button class="btn btn-warning" type="submit">
                            Simpan Perubahan
                        </button>
                    </form>

                    <form action="{{ route('review-replies.destroy', $review->reply_id) }}"
                          method="POST" class="mt-2"
                          onsubmit="return confirm('Hapus balasan ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" type="submit">
                            Hapus Balasan
                        </button>
                    </form>
                @else
                    <h6>Tambah Balasan</h6>

                    <form action="{{ route('review-replies.store', $review->review_id) }}"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Admin/Owner</label>
                            <input type="text" name="responder_name"
                                   class="form-control"
                                   value="{{ old('responder_name', 'Admin Dimsum Cece') }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Balasan</label>
                            <textarea name="reply" class="form-control"
                                      rows="3" required>{{ old('reply') }}</textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">
                            Kirim Balasan
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <p>Belum ada ulasan pelanggan.</p>
    @endforelse
</div>
@endsection
