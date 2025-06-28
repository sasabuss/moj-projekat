<form action="{{ route('update-product', $product->id) }}" method="POST">
    @csrf

    <input type="text" name="name" value="{{ $product->name }}" placeholder="Name" class="form-control mb-2">
    <textarea name="description" class="form-control mb-2">{{ $product->description }}</textarea>
    <input type="number" name="amount" value="{{ $product->amount }}" placeholder="Amount" class="form-control mb-2">
    <input type="number" name="price" value="{{ $product->price }}" placeholder="Price" step="0.01" class="form-control mb-2">
    <input type="text" name="image" value="{{ $product->image }}" placeholder="Image filename" class="form-control mb-3">

    <button class="btn btn-success">Update</button>
</form>
