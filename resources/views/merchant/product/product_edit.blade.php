@extends('merchant.merchant_master')
@section('content')
    <div class="wrap" style="margin: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('root.product.update',$edit_product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-3">
                                <label for="">Store Name</label>
                                <select class="form-control" name="store_id" id="">
                                    <option value="">-Select-</option>
                                    @foreach($stores as $store)
                                        <option {{ $store->id === $edit_product->store_id ? 'selected' : '' }} value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Category Name</label>
                                <select class="form-control" data-selected="{{ $edit_product->category_id }}" name="category_id" id="">
                                </select>
                                @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Product Name</label>
                                <input name="name" value="{{ $edit_product->name }}" class="form-control" type="text">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Price</label>
                                <input name="price" value="{{ $edit_product->price }}" class="form-control" type="number">
                                @error('price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Stock</label>
                                <input name="stock" value="{{ $edit_product->stock }}" class="form-control" type="number">
                                @error('stock')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Image</label>
                                <img id="img" style="height: 100px; width: 100px;" src="{{ URL::to('') }}/uploads/product/{{ $edit_product->image }}" alt="">
                                <input name="old_image" value="{{ $edit_product->image }}" type="hidden">
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
