@extends('frontend.front_master')
@section('frontend')

<div class="container heading-position">
    <div class="row">
        <h1>Category Name: {{ $category->name }}</h1>
        @foreach($products as $product)
        <div class="col-lg-3 col-md-3 col-sm-6 py-3">
            <div class="card text-center">
                <div class="card-body">
                    <img class="product-img" src="{{ URL::to('') }}/uploads/product/{{ $product->image }}" alt="">
                </div>
                <div class="card-footer">
                    <h5>{{ $product->name }}</h5>
                    <h5>Price: {{ $product->price }} BDT</h5>
                    <h5>Stock: {{ $product->stock }}</h5>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>




@endsection
