@extends('layouts.admin');

@section('content')
    <h3>Order History</h3>
    <h3>
        <a href="{{url('OrderDetails')}}" class="ms-auto btn btn-danger">Order Details</a>
    </h3>
    <section class="pt-3 pb-5">
        <div class="container pb-5">
            @if ($data->count() > 0)
                @foreach ($data as $item)
                    <div class="row my-2">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item->fname }}</h3>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            {{ $item->tracking_no }}
                                        </div>

                                        <div class="col-sm-2">
                                            Total Price:{{ $item->totalPrice == null ? '0' : $item->totalPrice }}
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="badge bg-success">
                                                Status: {{ $item->status == 0 ? 'Pending' : 'Completed' }}
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            {{-- {{$orderItems->}} --}}

                                        </div>
                                        <div class="col-sm-2">
                                            <a href="{{ url('admin/viewOrder/' . $item->id) }}" class="btn btn-danger ">View</a>
                                        </div>
                                    </div>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row my-2 product-Data">
                    <div class="col-12 text-center">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-danger fw-bold"><i class="fa-solid fa-cart-plus"></i>You don't have any
                                    Orders.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
