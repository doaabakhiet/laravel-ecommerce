@extends('layouts.mainPage')
@section('title')
    Cart Page
@endsection
@section('content')




    <section id="products">
        <div class="container py-5">
            <h4 class="text-danger fw-bold py-5">Cart Details</h4>
            <hr>


            @php  $total=0;  @endphp
            @if ($cartDetail->count() > 0)
                @foreach ($cartDetail as $item)
                    @php  $total+= $item->product->selling_price*$item->prod_qty;  @endphp
                    <div class="row my-2 product-Data">
                        <div class="col-12 cart_items">
                            <div class="card shadow">
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
                                        {{-- @if ($item->product->qty > $item->prod_qty) --}}
                                        <div class="col-sm-3 ">
                                            <div class="input-group qty-inp">
                                                <span class="qty-up input-group-text changeQty">+</span>
                                                <input type="text" class="qty form-control "
                                                    value="{{ $item->prod_qty }}" name="quantity">
                                                <span class="qty-down input-group-text changeQty">-</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            $ {{ $item->product->selling_price * $item->prod_qty }}
                                            <input type="hidden" class="item-id" value="{{ $item->prod_id }}">
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="#" class="btn btn-danger btn-deleteCart"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </div>
                                        {{-- @else
                                <div class="col-sm-6">
                                    <h4>Out Of Stock</h4>
                                </div>
                               
                            @endif --}}
                                        {{-- <div class="col-sm-3">
                                <a href="#" class="btn btn-danger btn-deleteCart"><i class="fa-solid fa-trash"></i></a>
                            </div> --}}
                                    </div>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="card shadow">
                    <div class="card-header">
                        <h4>
                            <span class="card-title"><span class="text-danger fw-bold">Total Price :
                                </span>{{ $total }}</span>
                            <a href="{{ url('checkoutDetail') }}" class="btn btn-outline-danger float-end">Proceed To
                                Checkout</a>
                        </h4>
                    </div>
                </div>
            @else
                <div class="row my-2 product-Data">
                    <div class="col-12 text-center">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-danger fw-bold"><i class="fa-solid fa-cart-plus"></i>Cart Is Empty !</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h4>
                            <span class="card-title"><span class="text-danger fw-bold">Total Price :
                                </span>{{ $total }}</span>
                            <a href="{{ url('/') }}" class="btn btn-outline-danger float-end">
                                Continue Shopping</a>
                        </h4>
                    </div>
                </div>
            @endif






        </div>
    </section>


@endsection
