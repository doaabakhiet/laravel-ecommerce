@extends('layouts.admin');

@section('content')
<h3>Category Page</h3>
<section class="pt-3 pb-5">
        <div class="container pb-5">
            <a href="{{url('addcategory')}}" class="btn btn-danger" >Add Category </a>
<table class="table caption-top pb-5 table-bordered table-striped">
            <caption class="textColor">List of Locations </caption>
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $item)
                  <tr >
                    <td>{{$item->id}}</td>
                    <th class="textColor">{{$item->name}}</th>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->description}}</td>
                    <td> <img src="{{asset('img/categories/'.$item->image)}}" alt="" width="100px" height="100px"> </td>
                    <td>
                      <a href="{{url('DeleteCategory/'.$item->id)}}" class="btn btn-primary mb-3">delete</a><br>
                      <a href="{{url('editCategory/'.$item->id)}}" class="btn btn-danger ">Edit</a>
                    </td>
                    
                </tr> 
                @endforeach
                
              </tbody>
            </table>
</div>
</section>

@endsection