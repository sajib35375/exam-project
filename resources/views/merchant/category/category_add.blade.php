@extends('merchant.merchant_master')
@section('content')

  <div class="wrap" style="margin: 20px;">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                  <div class="card-header">
                      <h2>Category Add</h2>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('root.store.category.create') }}" method="POST" enctype="multipart/form-data">
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
                              <input name="name" class="form-control" type="text">
                              @error('name')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="my-3">
                              <label for="">Category Image</label>
                              <img id="img" src="" alt="">
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
