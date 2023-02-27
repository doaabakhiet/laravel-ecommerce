@extends('layouts.mainPage')
@section('title') Category @endsection
@section('content')



    
<section id="products">
    <div class="container py-5">
      <h4 class="text-danger fw-bold py-5">Categories</h4>
        <hr>
   

                    <!--owl-carousal-->
                    <div class="owl-carousel owl-theme pt-5">
                        @foreach ($category as $item)
                        <div class="item ">
                            
                            <div class="card" style="">
                                <img src="{{asset('img/categories/'.$item->image)}}" class="card-img-top " style="height:140px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">$ {{$item->price}}</li>
                                </ul>
                                <div class="card-body">
                                <form method="post">
                                <input type="hidden" value="{{$item->id}}" name="item_id"/>
                                <input type="hidden" value="1" name="user_id"/>
                              
                                </form>
                                <a href="{{url('productPage')}}" class="card-link">Show Products</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <!--owl-carousal-->

                </div>
            </section>


@endsection