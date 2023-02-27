@extends('layouts.admin');
@section('title') User details @endsection
@section('content')
    <h3>View User Details</h3>
    <section class="pt-3 pb-5">
        <div class="container pb-5">
            <div class="row my-2 product-Data">
                <div class="col-sm-8">
                    <h2 class="fw-bold text-danger">More User Details</h2>
                    <hr>
                    <h4>
                        {{-- <span class="fw-bold text-danger">Role_AS :</span> {{ $data->role_as==1?"Admin":"User" }}<br><br> --}}
                        <span class="fw-bold text-danger">First Name :</span>{{$userdata? $userdata->fname:'' }}<br><br>
                        <span class="fw-bold text-danger">Lastt Name :</span>{{$userdata?$userdata->lname :''}}<br><br>
                        <span class="fw-bold text-danger">phone :</span>{{ $userdata?$userdata->phone:'' }}<br><br>
                         <span class="fw-bold text-danger">Address1 :</span>{{ $userdata?$userdata->address1:'' }}<br><br>
                        <span class="fw-bold text-danger">Address2 :</span>{{ $userdata?$userdata->address2:'' }}<br><br>
                        <span class="fw-bold text-danger">City :</span>{{ $userdata?$userdata->city :''}}<br><br>
                        <span class="fw-bold text-danger">State :</span>{{ $userdata?$userdata->state :''}}<br><br>
                        <span class="fw-bold text-danger">Zipcode :</span>{{ $userdata?$userdata->pincode :''}}<br><br>
                        <span class="fw-bold text-danger">tracking_no :</span>{{ $userdata?$userdata->tracking_no:'' }}<br><br>
                        {{-- <span class="fw-bold text-danger">Total Price:</span>{{ $userdata->totalPrice == 0 ? '0' : $order[0]->checkout->totalPrice }}<br><br> --}}
                    </h4>
                
                </div>

                <div class="col-sm-4">
                    <hr>
                        <div class="card shadow my-2">
                            <div class="card-header">
                                <h3 class="card-title">{{ $data->name }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span class="fw-bold text-danger"> {{ $data->role_as==1?"Admin":"User" }}</span><br><br>
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $data->email}}
                                    </div>
                                    
                                </div>
                                </p>

                            </div>
                        </div> 
                
                    <a href="{{ url('UserDetails') }}" class="btn btn-warning text-white float-end my-2 btn-lg">Go Back</a>
                </div>
            </div>

        </div>
    </section>
@endsection
