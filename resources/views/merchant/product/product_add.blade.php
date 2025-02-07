@extends('merchant.merchant_master')
@section('content')
<div class="wrap" style="margin: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add new products</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('root.product.create.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <label for="">Store Name</label>
                            <select class="form-control" name="store_id" id="">
                                <option value="">-Select-</option>
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                            @error('store_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Category Name</label>
                            <select class="form-control" name="category_id" id="">
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Product Name</label>
                            <input name="name" class="form-control" type="text">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Price</label>
                            <input name="price" class="form-control" type="number">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Stock</label>
                            <input name="stock" class="form-control" type="number">
                            @error('stock')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Image</label>
                            <img id="img" src="" alt="">
                            <input id="image" name="image" class="form-control" type="file">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <input class="btn btn-danger" value="Save" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
