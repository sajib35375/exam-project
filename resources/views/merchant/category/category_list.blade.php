@extends('merchant.merchant_master')
@section('content')

<div class="wrap" style="margin: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>Category List</h2>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->store->name?? '' }}</td>
                                <td>{{ $category->name }}</td>
                                <td><img style="width: 100px; height: 100px;" src="{{ URL::to('') }}/uploads/category/{{ $category->image }}" alt=""></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('root.category.edit',$category->id) }}">Edit</a>
                                    <a id="delete" class="btn btn-danger" href="{{ route('root.category.delete',$category->id) }}">Delete</a>
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
