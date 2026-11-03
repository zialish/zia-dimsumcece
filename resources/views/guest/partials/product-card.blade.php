
<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
    <div class="card h-100 rounded-4 border shadow-sm overflow-hidden">
        @if ($product->image)
            <div class="p-3">
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->product_name }}"
                     class="img-fluid rounded-3 w-100"
                     style="height: 180px; object-fit: contain;">
            </div>
        @else
            <div class="d-flex align-items-center justify-content-center bg-light m-3 rounded-3"
                 style="height: 180px;">
                <span class="text-secondary">Belum ada foto</span>
            </div>
        @endif

        <div class="card-body d-flex flex-column p-3 pt-0">
            <span class="badge bg-light text-dark align-self-start mb-2">
                {{ $product->category_name ?? 'Tanpa Kategori' }}
            </span>

            <h5 class="fw-bold mb-2">{{ $product->product_name }}</h5>

            <p class="text-secondary mb-3">
                {{ $product->description ?? 'Dimsum lezat Dimsum Cece' }}
            </p>

            <h5 class="fw-bold text-danger mt-auto mb-3">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </h5>

            <div>
                <span class="badge rounded-pill {{ $product->stock > 0 ? 'bg-success' : 'bg-secondary' }} px-3 py-2">
                    {{ $product->stock > 0 ? 'Tersedia' : 'Stok Habis' }}
                </span>
            </div>
        </div>
    </div>
</div>
