@extends('merchant.merchant_master')
@section('content')

    <div class="wrap" style="margin: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>All Store</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="60%">Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($all_store as $store)
                                <tr>
                                    <td>{{ $store->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('root.store.edit',$store->id) }}">Edit</a>
                                        <a id="delete" class="btn btn-danger" href="{{ route('root.store.delete',$store->id) }}">Delete</a>
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
