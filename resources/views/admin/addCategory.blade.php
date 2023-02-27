@extends('layouts.admin');
@section('content')
<h3>Add catgory</h3>
<div class="container">
<form action="{{url('insertCategory')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                <label for="exampleInputPassword1" class="form-label">Slug</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="slug">
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
                <div class="">
                    <label class="form-label">Status</label>
                    <input class="form-check-input mt-0" type="checkbox" value="" name="status" style="border:1px solid black !important;">
                </div>
                </div>
        </div>

        <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3" >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="">
                    <label class="form-label">Popular</label>
                    <input class="form-check-input mt-0" type="checkbox" value="" name="popular" style="border:1px solid black !important;">
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