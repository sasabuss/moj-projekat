@extends("layout")

@section("sadrzajStranice")

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <h2 class="mb-4 text-center">Add New Product</h2>

                <form action="{{route("save-product")}}" method="POST" class="bg-light p-4 rounded shadow-sm">
                    @csrf
                    <div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        @endif
                    <div/>


                    <!-- Name -->
                    <div class="mb-3">
                        <input type="text" name="name"  placeholder="Name of the product" class="form-control form-control-lg">
                    </div>

                    <!-- Description (textarea) -->
                    <div class="mb-3">
                        <textarea name="description" value="{{old("description")}}" placeholder="Description" class="form-control form-control-lg" rows="4"></textarea>
                    </div>

                    <!-- Amount & Price on the same row -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="number" value="{{old("amount")}}" name="amount" placeholder="Amount" class="form-control">
                        </div>
                        <div class="col-6">
                            <input type="number" value="{{old("price")}}" name="price" placeholder="Price" step="0.01" class="form-control">
                        </div>
                    </div>

                    <!-- Image filename -->
                    <div class="mb-4">
                        <input type="text" name="image" value="{{old("image")}}" placeholder="Image filename" class="form-control">
                    </div>

                    <button class="btn btn-success btn-lg w-100">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection

