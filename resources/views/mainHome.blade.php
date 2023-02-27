@extends('layouts.mainPage')
@section('title') Main Home @endsection
@section('content')



    

<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner h-75">
          <div class="carousel-item active h-50">
            <img src="{{asset('img/h2.jpg')}}" class="d-block w-100 " height="700px" alt="...">
          </div>
          <div class="carousel-item h-50">
            <img src="{{asset('img/h5.jpg')}}" class="d-block w-100 " height="700px" alt="...">
          </div>
          <div class="carousel-item h-50">
            <img src="{{asset('img/h4.jpg')}}" class="d-block w-100" height="700px" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

  </section>
<section id="products">
    <div class="container py-5">
      <h4 class="text-danger fw-bold">Featured Products</h4>
        <hr>
 
   

                    <!--owl-carousal-->
                    <div class="owl-carousel owl-theme pt-5">
                        @foreach ($products as $item)
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
                                <form method="post">
                                <input type="hidden" value="{{$item->id}}" name="item_id"/>
                                <input type="hidden" value="1" name="user_id"/>
                              
                                </form>
                                <a href="{{url('productDetail/'.$item->id)}}" class="card-link">Show More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <!--owl-carousal-->

                </div>
            </section>



        {{--trending products--}}


        <section id="products">
            <div class="container py-5">
              <h4 class="text-danger fw-bold">Categories</h4>
                <hr>
         
           
        
                            <!--owl-carousal-->
                            <div class="owl-carousel owl-theme pt-5">
                                @foreach ($trending_category as $item)
                                <div class="item ">
                                    
                                    <div class="card" style="">
                                        <img src="{{asset('img/categories/'.$item->image)}}" class="card-img-top " style="height:140px;" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->name}}</h5>
                                            <p class="card-text">{{$item->description}}</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            {{-- <li class="list-group-item">$ {{$item->selling_price}}</li> --}}
                                        </ul>
                                        <div class="card-body">
                                        <a href="{{url('categoryProducts/'.$item->id)}}" class="card-link">Show More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <!--owl-carousal-->
        
                        </div>
                    </section>
@endsection