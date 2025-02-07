@extends('merchant.merchant_master')
@section('content')

    <div class="wrap" style="margin: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Store</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('root.create.store') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Name</label>
                                <input name="name" class="form-control" type="text">
                                @error('name')
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
