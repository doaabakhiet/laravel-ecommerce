@extends('layouts.mainPage')
@section('title')
    Orders Page
@endsection
@section('content')




    <section id="products">
        <div class="container py-5">
            <h4 class="text-danger fw-bold py-5">Orders Details</h4>
            <hr>


            @if ($orderItems->count() > 0)
                @foreach ($orderItems as $item)
                    <div class="row my-2 product-Data">
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
                                            Price:{{ $item->totalPrice == null ? '0' : $item->totalPrice }}
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="badge bg-success">
                                                {{ $item->status == 0 ? 'Pending' : 'Completed' }}
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            {{-- {{$orderItems->}} --}}

                                        </div>
                                        <div class="col-sm-2">
                                            <a href="{{ url('viewOrder/' . $item->id) }}" class="btn btn-danger ">View</a>
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
