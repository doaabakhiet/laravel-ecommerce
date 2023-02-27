@extends('layouts.mainPage')
@section('title')
    Wishlist Page
@endsection
@section('content')




    <section id="products">
        <div class="container py-5 wishlistItems">
            <h4 class="text-danger fw-bold py-5">Wishlist Details</h4>
            <hr>
            @if ($wishlist->count()>0)
                @foreach ($wishlist as $item)
                    <div class="row my-2 product-Data">
                        <div class="col-12 ">
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

                                        <div class="col-sm-2">
                                            $ {{ $item->product->selling_price  }}
                                            <input type="hidden" class="item-id" value="{{ $item->prod_id }}">
                                        </div>
                  
                                        <div class="col-sm-2">
                                            <a href="#" class="btn btn-danger btn-deleteWishlist"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </div>
                                        <div class="col-sm-3" >
                                                <div class="input-group qty-inp">
                                                        <span class="qty-up input-group-text ">+</span>
                                                        <input type="text" class="qty form-control "
                                                            value="0" name="quantity">
                                                        <span class="qty-down input-group-text ">-</span>
                                                    &nbsp;&nbsp;
                                                    <a href="#" class="btn btn-danger fw-bold cartBtn"><i
                                                        class="fa-solid fa-cart-plus"></i></a>
                                                </div>
                                                
                                        </div>
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
                        
                            <a href="{{ url('checkoutDetail') }}" class="btn btn-outline-danger float-end">Proceed To
                                Checkout</a>
                        </h4>
                    </div>
                </div>
            @else
                <div class="row my-2 ">
                    <div class="col-12 text-center">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-danger fw-bold"><i class="fa-solid fa-cart-plus"></i>No Products At WishList...! !</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h4>
                            
                            <a href="{{ url('/') }}" class="btn btn-outline-danger float-end">
                                Continue Shopping</a>
                        </h4>
                    </div>
                </div>
            @endif
            





        </div>
    </section>


@endsection
