@extends('frontend.front_master')
@section('frontend')

<div class="container">
    <div class="row">
        @foreach($stores as $store)
            <div class="col-lg-3 col-md-3 col-sm-4 py-3">
                <a href="{{ route('store.wise',$store->id) }}">
                    <div class="card">
                        <div class="card-body">
                            <img class="w-100" src="{{ asset('frontend/images/store/store.png') }}" alt="">
                        </div>
                        <div class="card-footer store-name w-100">
                            <a href="{{ route('store.wise',$store->id) }}"><strong>Shop: {{ $store->name }}</strong></a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


@endsection
