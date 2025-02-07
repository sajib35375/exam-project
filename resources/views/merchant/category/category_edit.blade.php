@extends('merchant.merchant_master')
@section('content')
    <div class="wrap" style="margin: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Category Edit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('root.category.update',$category_edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-3">
                                <label for="">Store Name</label>
                                <select class="form-control" name="store_id" id="">
                                    <option value="">-Select-</option>
                                    @foreach($stores as $store)
                                        <option {{ $store->id === $category_edit->store_id ? 'selected' : '' }} value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Category Name</label>
                                <input name="name" value="{{ $category_edit->name }}" class="form-control" type="text">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Category Image</label>
                                <img id="img" style="width: 100px; height: 100px;" src="{{ URL::to('') }}/uploads/category/{{ $category_edit->image }}" alt="">
                                <input name="old_image" value="{{ $category_edit->image }}" type="hidden">
                                <input id="image" class="form-control" name="image" type="file">
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
