@extends("layout")

@section('tittle')
    Dashboard
@endsection

@section('sadrzajStranice')

    @if($sat >= 0 && $sat <= 12)
        <p>Dobro jutro</p>
    @else
        <p>Dobar dan</p>
    @endif
    <p>Trenutno sati: {{$sat}}</p>
    <p> Trenutno vreme: {{$trenutnoVreme}}</p>

    <div class="container py-4">
        <h2 class="mb-4">Latest Products</h2>
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm d-flex flex-column">
                        <img src="{{ asset('images/products/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="card-img-top"
                             style="max-height: 200px; object-fit: contain; padding: 1rem; background-color: #f8f9fa;">
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
    </div>


@endsection



