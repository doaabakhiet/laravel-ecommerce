@extends('layouts.mainPage')
@section('title')
    Product Detail
@endsection
@section('content')
    <section id="products">
        @foreach ($productDetail as $item)
            <div class="container py-5 product-Data">
                <h4 class="text-danger fw-bold py-5">Product Detail : {{ $item->category->name }}/{{ $item->name }}</h4>
                <div class="row shadow">
                    <div class="col-sm-4">
                        <img src="{{ asset('img/products/' . $item->image) }}" class="card-img-top " style=""
                            alt="...">
                    </div>

                    <div class="col-sm-7 px-5">

                        <h4 class="text-danger fw-bold my-3">
                            {{ $item->name }}
                        </h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="text-danger fw-bold">Category</span>
                                :{{ $item->category->name }}</li>
                            <li class="list-group-item">$ {{ $item->selling_price }}</li>
                            <li class="list-group-item">{{ $item->small_description }}</li>
                            <li class="list-group-item">{{ $item->description }}</li>
                            <li class="list-group-item">
                                <div class="input-group qty-inp">
                                    <input type="hidden" class="prod_id" value="{{ $item->id }}" />
                                    <span class="qty-up input-group-text">+</span>
                                    <input type="text" class="qty form-control " value="1" name="quantity">
                                    <span class="qty-down input-group-text">-</span>
                                </div>
                            </li>
                            <li class="list-group-item">

                                {{-- <input type="hidden" class="user_id" value={{}}"/> --}}
                                <h5 class="d-flex">
                                    {!! $checkCart
                                        ? '<p class="badge bg-danger my-2">In Stock</p>'
                                        : '<p class="badge bg-success my-2">Out Of Stock</p>' !!}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <form method="post">
                                        <button type="submit" class="btn btn-danger fw-bold cartBtn"><i
                                                class="fa-solid fa-cart-plus"></i></button>
                                    </form>
                                    {{-- <button  class="btn btn-danger fw-bold cartBtn"><i class="fa-solid fa-cart-plus"></i></button> --}}

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <form method="post">
                                        <button type="submit" class="btn btn-primary addToWishList fw-bold"><i
                                                class="fa-solid fa-heart"></i>&nbsp;WishList</button>
                                    </form>

                                </h5>
                            </li>
                            <li class="list-group-item d-flex">
                                <input type="hidden" name="prodId" class="prodId" value="{{ $item->id }}" />
                                <div class="rating-css">
                                    @php
                                        $numStars = (int) $starRate;
                                        if ($numStars == 0) {
                                            $yellowStar = 1;
                                            // $greyStars=4;
                                        } else {
                                            $yellowStar = $numStars;
                                        }
                                        //  $greyStars=5-$numStars;
                                    @endphp

                                    <div class="star-icon">
                                        @for ($i = 1; $i <= $yellowStar; $i++)
                                            <input type="radio" value="{{ $i }}" name="product_rating"
                                                class="prodRating{{ $i }}"checked id="{{ 'rating' . $i }}">
                                            <label for="{{ 'rating' . $i }}" class="fa fa-star"></label>
                                        @endfor
                                        @for ($i = $yellowStar + 1; $i <= 5; $i++)
                                            <input type="radio" value="{{ $i }}" name="product_rating"
                                                class="prodRating{{ $i }}" id="{{ 'rating' . $i }}">
                                            <label for="{{ 'rating' . $i }}" class="fa fa-star"></label>
                                        @endfor

                                    </div>
                                </div>
                                <span class="RatingNum text-dark fw-bold" style="padding: 30px 0;">
                                    &nbsp;&nbsp;&nbsp;{{ $numOfRating }} Ratings
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-1"><span class="badge bg-danger my-3">{{ $item->trending ? 'Trending' : '' }}</span>
                    </div>
                </div>

                <div class="row">

                    <div class="comment-section">
                        <div class="container">
                            <div class="col-12">
                                <h2 class="R-title">Comments</h2>
                                @foreach ($productDetail as $item)
                                @php 
                                    $id=$item->id;
                                @endphp
                                @endforeach
                                @if(Auth::User())
                                <form action="{{url('addComment')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$id}}" name="prodCommentid">
                                    <div class="form-floating">
                                        <textarea name="newComment"class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Add Comment</label>
                                    </div>
                                    <button type="submit" class="btn btn-danger my-3">Add Comment</button>
                                </form>
                                @else
                                <a href="{{url('login')}}" class="btn btn-danger my-3">Login To Add Comment</a>
                                @endif

                            </div>
                            <div class="col-12">
                                <div class="review">
                                    <span class="float-end text-secondary">{{$commentCount}} commnt</span>             
                                    <div class="comment-section">
                                        @if($commentsData->count()>0)
                                        @foreach($commentsData as $item)
                                        <div class="media media-review">
                                            <div class="media-user"><img src="https://i.imgur.com/nUNhspp.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="M-flex">
                                                    <h2 class="title"><span class="text-danger"> {{$item->users->name}} </span> {{$item->created_at->format('d M Y')}}</h2>
                                                    <h5> {{$item->users->email}}</h5>
                                                    <h6>
                                                    
                                                    </h6>
                                                </div>
                                                <div class="description">{{$item->comment}}
                                                
                                                    <br><br>
                                                    @if(Auth::User())
                                                        @if($item->user_id==Auth::User()->id)
                                                        <input type="hidden" value="{{$item->id}}" class="comment_id"/>
                                                        <a href="#" class="float-end btn btn-secondary mx-2 deleteComment">Cancel</a>&nbsp;&nbsp;&nbsp;
                                                        <a href="#" class="float-end btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateCommentModal">Edit</a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="updateCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{url('EditComment')}}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" value="{{$id}}" name="prodCommentEditid">
                                                                        <div class="form-floating">
                                                                            <textarea name="newEditComment" value="{{$item->comment}}"class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$item->comment}}</textarea>
                                                                            <label for="floatingTextarea2">Edit Comment</label>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-danger my-3">Edit Comment</button>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div>
                                                    </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="media media-review ">
                                            <h2 class="fw-bold text-danger">There Is No Reviews Yet</h2>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                        </div>
        @endforeach



    </section>
@endsection
