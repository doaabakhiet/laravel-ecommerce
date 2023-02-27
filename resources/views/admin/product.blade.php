@extends('layouts.admin');

@section('content')
<h3>Product Page</h3>
<section class="pt-3 pb-5">
        <div class="container pb-5">
            <a href="{{url('addproduct')}}" class="btn btn-danger" >Add Product </a>
<table class="table caption-top pb-5 table-bordered table-striped">
            <caption class="textColor">List of Locations </caption>
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>small_description</th>
                    <th>Category</th>
                    <th>O Price
                    /S price</th>
                    <th>Qty</th>
                    <th>image</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $item)
                  <tr >
                    <td>{{$item->id}}</td>
                    <th class="textColor">{{$item->name}}</th>
                    <td>{{$item->small_description}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->original_Price}}/{{$item->selling_price}}</td>
                    <td>{{$item->qty}}</td>
                    <td> <img src="{{asset('img/products/'.$item->image)}}" alt="" width="100px" height="100px"> </td>
                    <td>
                      <a href="{{url('DeleteProduct/'.$item->id)}}" class="btn btn-primary mb-3">delete</a><br>
                      <a href="{{url('EditProduct/'.$item->id)}}" class="btn btn-danger ">Edit</a>
                    </td>
                    
                </tr> 
                @endforeach
                
              </tbody>
            </table>
</div>
</section>

@endsection