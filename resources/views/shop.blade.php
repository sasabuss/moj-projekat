@extends("layout")

@section("sadrzajStranice")

    <div class="container py-4">
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm d-flex flex-column bg-light">

                        <!-- Slika proizvoda -->
                        <img src="{{ asset('images/products/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="card-img-top"
                             style="max-height: 200px; object-fit: contain; padding: 1rem; background-color: #f8f9fa;">

                        <!-- Telo kartice -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="mb-1"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p><strong>In stock:</strong> {{ $product->amount }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Dugme dodaj proizvod -->
        <div class="mt-5 text-center">
            <a href="/admin/add-product" class="btn btn-success btn-lg">Add your product</a>
        </div>
    </div>

@endsection
