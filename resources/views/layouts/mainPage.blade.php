<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <!-- Material Icons -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700;800&family=Open+Sans:wght@300&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        * {
            font-family: 'Baloo Thambi 2', cursive;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Roboto Condensed', sans-serif;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap5.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files -->
    {{-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> --}}
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('mainHome') }}">E-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('categoryPage') }}">Category</a>
                    </li>
                    <li class="nav-item dropdown fw-bold">
                        <a class="nav-link bg-danger" style="border-radius:47%;" href="{{ url('cartDetail') }}"
                            id="navbarCart" role="button">
                            <span class="text-white"><i class="fa-solid fa-cart-plus"></i></span>&nbsp;
                            <span class="text-danger bg-light p-1 cart-qty"
                                style="border-radius:40%; ">{{ Auth::user() ? $countCart : 0 }}</span>
                        </a>

                    </li>
                    <li class="nav-item dropdown bg-danger  fw-bold" style="border-radius:47%; ">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('dashboard') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('myorders') }}">Orders</a></li>
                                <li><a class="dropdown-item" href="{{ url('wishlist') }}">Wishlist
                                        <span class="badge bg-danger text-white wishlistCount">0</span>
                                    </a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                    </li>

                </ul>
                <form class="d-flex" method="post" action="{{ url('searchReasult') }}">
                    @csrf
                    <input class="form-control me-2"id="search_products" name="prod_name" required type="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ">

                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-instagram"></i
            ></a>
      
            <!-- Linkedin -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-linkedin"></i
            ></a>
            <!-- Github -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
  <!-- Footer -->
  

    <div class="watsapp-chat ">
        <a href="https://wa.me/+0201118700584?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="{{ asset('img/watsapplogo.png') }}" alt="watsapp-logo" height="70px" width="70px">
        </a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6354a943b0d6371309cafbf1/1gg1baceu';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            var availableTags = [];
            $.ajax({
                type: "GET",
                url: "{{ url('productList') }}",
                success: function(response) {
                    startAutoComplete(response)
                }
            });

            function startAutoComplete(availableTags) {
                $("#search_products").autocomplete({
                    source: availableTags
                });
            }

        });
    </script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!---->
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script> --}}
    <!-- Replace "test" with your own sandbox Business account app client ID -->

    {{-- <script src="{{ asset('js/core/mainPage.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            loadwishlist();
            $('.owl-carousel').owlCarousel({
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            //

            //
            $(document).on('click', '.qty-up', function(e) {
                e.preventDefault();
                var inc_val = parseInt($(this).closest('.product-Data').find('.qty').val(), 10);
                inc_val = isNaN(inc_val) ? 0 : inc_val;
                if (inc_val >= 1 && inc_val <= 10) {
                    inc_val++;
                    $(this).closest('.product-Data').find('.qty').val(inc_val);
                }
            });

            //
            $(document).on('click', '.qty-down', function(e) {
                e.preventDefault();
                var inc_val = parseInt($(this).closest('.product-Data').find('.qty').val(), 10);
                inc_val = isNaN(inc_val) ? 0 : inc_val;
                if (inc_val >= 2 && inc_val <= 10) {
                    inc_val--;
                    $(this).closest('.product-Data').find('.qty').val(inc_val);
                }
            });

            //cart





            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.rating-css input + label').click(function(e) {
                // e.preventDefault();
                var starNum = $(this).prev("input[type='radio']").val();
                var prodId = $('.prodId').val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('addRating') }}",
                    data: {
                        'product_rating': starNum,
                        'prodId': prodId
                    },
                    dataType: "json",
                    success: function(response) {
                        // window.location.reload();
                        if (response.LoginPurchase) {
                            swal.fire(response.LoginPurchase)
                            $("input[type='radio']").prop('checked', false);
                            $('.rating-css .prodRating1 + label ~ label').css('color',
                                '#b4afaf');
                        } else {
                            window.location.reload();
                        }
                    }
                });
            });

            //


            $('.deleteComment').click(function(e) {
                e.preventDefault();
                var comment_id = $('.comment_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('deleteComment') }}",
                    data: {
                        'comment_id': comment_id
                    },
                    dataType: "json",
                    success: function(response) {
                        swal.fire(response.status);
                        window.location.reload();
                    }
                });

            });


            //
            $('.cartBtn').click(function(e) {
                e.preventDefault();
                var qty = $('.qty').val();
                var prod_id = $('.prod_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('addToCart') }}",
                    data: {
                        'prod_id': prod_id,
                        'qty': qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        swal.fire(response.status);
                        window.location.reload();

                    }
                });

            });
            $(document).on('click', '.btn-deleteCart', function(e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product-Data').find('.item-id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('deleteCart') }}",
                    data: {
                        'prod_id': prod_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        //window.location.reload();
                        $('.cart_items').load(location.href + " .cart_items");
                        $('.navbar').load(location.href + " .navbar");
                        swal.fire("", response.status, "success");
                        // alert('s');
                    }
                });

            });


            //
            $(document).on('click', '.changeQty', function(e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product-Data').find('.item-id').val();
                var qty = $(this).closest('.product-Data').find('.qty').val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('changeQty') }}",
                    data: {
                        "prod_id": prod_id,
                        "qty": qty
                    },
                    dataType: "json",
                    success: function(response) {
                        //window.location.reload();
                        $('.container').load(location.href + " .container");
                    }
                });
            });
            //

            $('.addToWishList').click(function(e) {
                e.preventDefault();
                var prod_id = $('.prod_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('addToWishList') }}",
                    data: {
                        'prod_id': prod_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        loadwishlist();
                        swal.fire(response.status);
                    }
                });
            });
            //


            $(document).on('click', '.btn-deleteWishlist', function(e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product-Data').find('.item-id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('deleteWishlist') }}",
                    data: {
                        'prod_id': prod_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.wishlistItems').load(location.href + " .wishlistItems");
                        loadwishlist();
                        swal.fire("", response.status, "success");
                        // alert('s');
                    }
                });

            });
            //
            function loadwishlist() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('wishlistCount') }}",
                    success: function(response) {
                        $('.wishlistCount').text(response.count);
                    }
                });
            }




            //
            $('.Razorpay-btn').click(function(e) {
                e.preventDefault();
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var pincode = $('.pincode').val();
                var tracking_no = $('.tracking_no').val();
                var totalPrice = $('.totalPrice').val();
                var fname_error, lname_error, phone_error, address1_error, address2_error, city_error,
                    state_error, pincode_error, tracking_no_error;
                if (!fname) {
                    fname_error = "First Name is Required";
                    $('#fname').html(fname_error);
                } else {
                    fname_error = "";
                    $('#fname').html('');
                }
                if (!lname) {
                    lname_error = "Last Name is Required";
                    $('#lname').html(lname_error);
                } else {
                    lname_error = "";
                    $('#lname').html('');
                }
                if (!phone) {
                    phone_error = "phone Name is Required";
                    $('#phone').html(phone_error);
                } else {
                    phone_error = "";
                    $('#phone').html('');
                }
                if (!address1) {
                    address1_error = "Address 1 Name is Required";
                    $('#address1').html(address1_error);
                } else {
                    address1_error = "";
                    $('#address1').html('');
                }
                if (!address2) {
                    address2_error = "Address 2 Name is Required";
                    $('#address2').html(address2_error);
                } else {
                    address2_error = "";
                    $('#address2').html('');
                }
                if (!city) {
                    city_error = "First Name is Required";
                    $('#city').html(city_error);
                } else {
                    city_error = "";
                    $('#city').html('');
                }
                if (!state) {
                    state_error = "State Name is Required";
                    $('#state').html(state_error);
                } else {
                    state_error = "";
                    $('#state').html('');
                }
                if (!pincode) {
                    pincode_error = "pincode Name is Required";
                    $('#pincode').html(pincode_error);
                } else {
                    pincode_error = "";
                    $('#pincode').html('');
                }
                if (!tracking_no) {
                    tracking_no_error = "tracking_no Name is Required";
                    $('#tracking_no').html(tracking_no_error);
                } else {
                    tracking_no_error = "";
                    $('#tracking_no').html('');
                }
                if (fname_error != null || lname_error != null || phone_error != null || address1_error !=
                    null || address2_error != null || city_error != null || state_error != null ||
                    pincode_error != null || tracking_no_error != null) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('proceedToPay') }}",
                        data: {
                            'fname': fname,
                            'lname': lname,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'pincode': pincode,
                            'tracking_no': tracking_no,
                            'totalPrice': totalPrice
                        },
                        dataType: "json",
                        success: function(response) {
                            //alert(response.totalPrice)
                            var options = {
                                "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                                "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name": "Acme Corp",
                                "description": "Test Transaction",
                                "image": "https://example.com/your_logo",
                                "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                "handler": function(response) {
                                    alert(response.razorpay_payment_id);
                                    alert(response.razorpay_order_id);
                                    alert(response.razorpay_signature)
                                },
                                "prefill": {
                                    "name": "Gaurav Kumar",
                                    "email": "gaurav.kumar@example.com",
                                    "contact": "9999999999"
                                },
                                "notes": {
                                    "address": "Razorpay Corporate Office"
                                },
                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();


                        }
                    });

                }
            });


        });
    </script>
    @if (session('status'))
        <script>
            swal.fire("{{ session('status') }}");
        </script>
    @endif
</body>

</html>
