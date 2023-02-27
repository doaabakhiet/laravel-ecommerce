@extends('layouts.mainPage')
@section('title') Main Home @endsection
@section('content')


        {{--trending products--}}


        <section id="products">
            <div class="container py-5">
              <h4 class="text-danger fw-bold py-5">Categories</h4>
                <hr>
         
           
        
                            <!--owl-carousal-->
                            <div class="owl-carousel owl-theme pt-5">
                                @foreach ($catProducts as $item)
                                <div class="item ">
                                    
                                    <div class="card" style="">
                                        <img src="{{asset('img/products/'.$item->image)}}" class="card-img-top " style="height:140px;" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->name}}</h5>
                                            <p class="card-text">{{$item->small_description}}</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">$ {{$item->selling_price}}</li>
                                        </ul>
                                        <div class="card-body">
                                        <a href="{{url('productDetail/'.$item->id)}}" class="card-link">Show More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <!--owl-carousal-->
        
                        </div>
                    </section>
@endsection