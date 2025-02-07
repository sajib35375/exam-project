@extends('frontend.front_master')
@section('frontend')

    <div class="container ">

        <div class="row heading-position">
            <h1>Shop Name: {{ $store->name }}</h1>
            @foreach($categories as $category)
            <div class="col-lg-2 col-md-2 col-sm-3 py-3">
                <a href="{{ route('category.product',$category->id) }}">
                    <div class="card">
                        <div class="card-body">
                            <img class="cat-img" src="{{ URL::to('') }}/uploads/category/{{ $category->image }}" alt="">
                        </div>
                        <div class="card-footer">
                            <h6>Category: {{ $category->name }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>


@endsection
