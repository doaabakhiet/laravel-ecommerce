@extends('layouts.admin');
@section('content')
<h3>Add Product</h3>
<div class="container">
<form action="{{url('UpdateProduct')}}" method="post" enctype="multipart/form-data">
    @csrf
    method_field("PUT")
    <input type="hidden" value="{{$data->id}}" name="id">
    <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <select class="form-select" aria-label="Default select example" name="catId">
                    <option selected value="{{$categorydata->id}}">{{$categorydata->name}}</option>
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
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->name}}" name="name">
                </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label for="exampleInputPassword1" class="form-label">Small description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->small_description}}" name="small_description">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" value="{{$data->description}}">{{$data->description}}</textarea>
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Original Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->original_Price}}"  name="original_Price" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Selling Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->selling_price}}" name="selling_price" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
        <label class="form-label">Image</label>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                    <input type="file" class="form-control" name="image" id="image" value="{{$data->image}}">
                    @if($data->image)
                    <input type="hidden"  name="image2"  value="{{$data->image}}">
                    <img src="{{asset('img/products/'.$data->image)}}" alt="category" width="100px" height="100px">
                    @endif
                </div>
            </div>
        </div>
        
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" value="{{$data->qty}}"  name="qty" >
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Taxes</label>
                <input type="text" class="form-control" value="{{$data->taxes}}" name="taxes" >
            </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="">
                    <label class="form-label">Status</label>
                    <input class="form-check-input mt-0" type="checkbox" {{$data->status==1 ?'checked':''}} name="status" style="border:1px solid black !important;">
                </div>
                </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="">
                <label class="form-label">Trending</label>
                <input class="form-check-input mt-0" type="checkbox" {{$data->status==1 ?'checked':''}} name="trending" style="border:1px solid black !important;">
            </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" value="{{$data->meta_title}}" name="meta_title">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Descrition</label>
                <input type="text" class="form-control" value="{{$data->meta_description}}" name="meta_description">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" value="{{$data->meta_keywords}}" name="meta_keywords">
                </div>
            </div>
        </div>

      
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection