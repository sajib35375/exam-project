@extends('merchant.merchant_master')
@section('content')

<div class="wrap" style="margin: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>Product List</h2>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Stock</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->store->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><img style="width: 100px; height: 100px;" src="{{ URL::to('') }}/uploads/product/{{ $product->image }}" alt=""></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('root.product.edit',$product->id) }}">Edit</a>
                                    <a id="delete" class="btn btn-danger" href="{{ route('root.product.delete',$product->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
