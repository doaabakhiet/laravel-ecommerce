@extends('layouts.admin');
@section('content')
<h3>Edit catgory</h3>
<div class="container">
<form action="{{url('UpdateCategory')}}" method="post" enctype="multipart/form-data">
    @csrf
    method_field("PUT")
    <input type="hidden" value="{{$data->id}}" name="id">
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$data->name}}">
                </div>
            </div>
        </div>
        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label for="exampleInputPassword1" class="form-label">Slug</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="slug" value="{{$data->slug}}">
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
                <div class="">
                    <label class="form-label">Status</label>
                    <input class="form-check-input mt-0" type="checkbox" {{$data->status==1 ?'checked':''}} name="status" style="border:1px solid black !important;">
                </div>
                </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="">
                    <label class="form-label">Popular</label>
                    <input class="form-check-input mt-0" type="checkbox" {{$data->popular==1 ?'checked':''}} name="popular" style="border:1px solid black !important;">
                </div>
                </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
        <label class="form-label">Image</label>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                    <input type="file" class="form-control" name="image" id="image" value="{{$data->image}}">
                    @if($data->image)
                    <img src="{{asset('img/categories/'.$data->image)}}" alt="category" width="100px" height="100px">
                    @endif
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}">
                </div>
            </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Descrition</label>
                <input type="text" class="form-control" name="meta_description" value="{{$data->meta_description}}">
                </div>
            </div>
        </div> 

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keywords" value="{{$data->meta_keywords}}">
                </div>
            </div>
        </div>

      
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection