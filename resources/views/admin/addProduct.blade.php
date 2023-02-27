@extends('layouts.admin');
@section('content')
<h3>Add Product</h3>
<div class="container">
<form action="{{url('insertProduct')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <select class="form-select" aria-label="Default select example" name="catId">
                    <option selected value="">Select Category</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label for="exampleInputPassword1" class="form-label">Small description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="small_description">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Original Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="original_Price" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Selling Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="selling_price" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
        <label class="form-label">Image</label>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                    <input type="file" class="form-control" name="image" id="image">
                </div>
            </div>
        </div>
        
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" value="" name="qty" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Taxes</label>
                <input type="text" class="form-control" value="" name="taxes" >
            </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="">
                    <label class="form-label">Status</label>
                    <input class="form-check-input mt-0" type="checkbox" value="" name="status" style="border:1px solid black !important;">
                </div>
                </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="">
                <label class="form-label">Trending</label>
                <input class="form-check-input mt-0" type="checkbox" value="" name="trending" style="border:1px solid black !important;">
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Descrition</label>
                <input type="text" class="form-control" name="meta_description">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keywords">
                </div>
            </div>
        </div>

      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection