@extends('layouts.mainPage')
@section('title')
    View Order Details
@endsection
@section('content')




    <section id="products">
        <div class="container py-5">
            <h4 class="text-danger fw-bold py-5">View Order Details</h4>
            <hr>


            
                
                  <div class="row my-2 product-Data">
                        <div class="col-5">
                            <h2 class="fw-bold text-danger">Shipping Details</h2><hr>
                            <h4>
                                <span class="fw-bold text-danger">First Name :</span>{{$order[0]->checkout->fname}}<br><br>
                                <span class="fw-bold text-danger">Lastt Name :</span>{{$order[0]->checkout->lname}}<br><br>
                                <span class="fw-bold text-danger">phone :</span>{{$order[0]->checkout->phone}}<br><br>
                                <span class="fw-bold text-danger">Address1 :</span>{{$order[0]->checkout->address1}}<br><br>
                                <span class="fw-bold text-danger">Address2 :</span>{{$order[0]->checkout->address2}}<br><br>
                                <span class="fw-bold text-danger">City :</span>{{$order[0]->checkout->city}}<br><br>
                                <span class="fw-bold text-danger">State :</span>{{$order[0]->checkout->state}}<br><br>
                                <span class="fw-bold text-danger">Zipcode :</span>{{$order[0]->checkout->pincode}}<br><br>
                                <span class="fw-bold text-danger">tracking_no :</span>{{$order[0]->checkout->tracking_no}}<br><br>
                                <span class="fw-bold text-danger">Total Price :</span>{{$order[0]->checkout->totalPrice==0 ?'0':$order[0]->checkout->totalPrice}}<br><br>
                            </h4>
                        </div>
                        
                        <div class="col-7">
                            <h2 class="fw-bold text-danger">Order Details</h2><hr>
                            @foreach ($order as $item)
                            <div class="card shadow my-2">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item->product->name }}</h3>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{ asset('img/products/' . $item->product->image) }}" alt="image"
                                                height="100px" width="100px">
                                        </div>
                                        <div class="col-sm-2">
                                            ${{$item->price}}
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            Quantity: {{$item->qty}}
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="badge bg-success">
                                                {{$item->checkout->status == 0 ?'Pending':'Completed'}}
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            {{-- {{$orderItems->--}}
                                            
                                        </div>
                                        <div class="col-sm-2">
                                            {{-- <a href="/viewOrder.{{$item->id}}" class="btn btn-danger btn-deleteCart">View</a>--}} 
                                        </div>
                                   </div>
                                    </p>

                                </div>
                            </div>
                            @endforeach
                            <a href="{{url('myorders')}}" class="btn btn-warning text-white float-end my-2 btn-lg">Go Back</a>
                        </div>
                    </div> 
                
        </div>
    </section>


@endsection
