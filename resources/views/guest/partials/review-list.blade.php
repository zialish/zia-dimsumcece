<section id="ulasan-pelanggan" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Ulasan Pelanggan</h2>
            <p class="text-secondary">
                Cerita pelanggan tentang Dimsum Cece
            </p>
        </div>

        <div class="row g-4">
            @forelse ($reviews as $review)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border rounded-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">
                                {{ $review->customer_name }}
                            </h5>

                            <p class="text-warning mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review->rating ? '★' : '☆' }}
                                @endfor
                            </p>

                            <p class="text-secondary small mb-1">
                                Produk:
                                {{ $review->product->product_name ?? 'Produk tidak tersedia' }}
                            </p>

                            <p class="mb-3">
                                {{ $review->comment }}
                            </p>

                            @if ($review->reply)
                                <div class="bg-light rounded-3 p-3">
                                    <strong>
                                        Balasan {{ $review->reply->responder_name }}
                                    </strong>
                                    <p class="mb-0 mt-1">
                                        {{ $review->reply->reply }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-secondary">
                        Belum ada ulasan pelanggan.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('reviews.create') }}"
               class="btn btn-warning px-4">
                Berikan Ulasan
            </a>
        </div>
    </div>
</section>
