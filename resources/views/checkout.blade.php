    @extends('layouts.mainPage')
    @section('title')
        Checkout Page
    @endsection
    @section('content')
     
        <section id="products">
            <div class="container py-5">
                <h4 class="text-danger fw-bold py-5">Checkout Details</h4>
                <hr>
                @php  $total=0;  @endphp
                <form action="{{ url('plaOrder') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="text-danger fw-bold">Basic Details</h3>
                            {{-- --}}
                            
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label for="exampleInputPassword1" class="px-2">First Name</label>
                                            <input type="text" class="form-control fname" id="exampleInputPassword1"
                                                name="fname">
                                            <br><div id="fname" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label for="exampleInputPassword1" class="px-2">Last Name</label>
                                            <input type="text" class="form-control lname" id="exampleInputPassword1"
                                                name="lname">
                                                <div id="lname" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">Email</label>
                                            <input type="email" class="form-control email" name="email" disabled
                                                value="{{ Auth::user()->email }}">
                                                <div id="email" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">Phone Number</label>
                                            <input type="text" class="form-control phone" name="phone">
                                            <div id="phone" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">Address I</label>
                                            <input type="text" class="form-control address1" name="address1">
                                            <div id="address1" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">Address II</label>
                                            <input type="text" class="form-control address2" name="address2">
                                            <div id="address2" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">City</label>
                                            <input type="text" class="form-control city" name="city">
                                            <div id="city" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">State</label>
                                            <input type="text" class="form-control state" name="state">
                                            <div id="state" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4 p-3">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                            <label class="px-2">pincode</label>
                                            <input type="text" class="form-control pincode" name="pincode">
                                            <div id="pincode" class="text-danger fw-bold"></div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                            
                            {{-- --}}
                        </div>
                        <div class="col-sm-5 ">
                           
                                <h3 class="text-danger fw-bold ">Order Details</h3>
                                @foreach ($cartItems as $item)
                                    @if ($item->product->qty >= $item->prod_qty)
                                    @php  $total+= $item->product->selling_price*$item->prod_qty;  @endphp
                                        <div class="card my-2">
                                            <div class="card-header">
                                                <h4 class="text-danger">
                                                    {{ $item->product->name }}
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <blockquote class="blockquote mb-0 d-flex">
                                                    <p>Quantity:{{ $item->prod_qty }}</p>
                                                    <p class="ms-auto">$ {{ $item->product->selling_price * $item->prod_qty }}</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="card my-2">
                                    <div class="card-header">
                                        <span class="fw-bold text-danger">
                                            Total Price :
                                        </span>{{$total}}
                                    </div>
                                </div>
                                <input type="hidden" name="totalPrice" class="totalPrice" value="{{$total}}">
                                <button type="submit" class="btn btn-danger">Place Order</button>&nbsp;&nbsp;
                                <a href="#" class="btn btn-primary Razorpay-btn">Pay With Razorpay</a><br>  
                            </form>


                            <br>
                            <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=ATeI_ZbaoTZ863g9FrcpLgToE6EAw1U849DTjT1S8vzfS4FrpBFWbI1Hj3OZkBW-w2O1ZR1JIWFLVC9Y&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{$total}}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            var fname=$('.fname').val();
                var lname=$('.lname').val();
                var phone=$('.phone').val();
                var address1=$('.address1').val();
                var address2=$('.address2').val();
                var city=$('.city').val();
                var state=$('.state').val();
                var pincode=$('.pincode').val();
                var tracking_no=$('.tracking_no').val();
                var totalPrice=$('.totalPrice').val();
            $.ajax({
                    type: "POST",
                    url: "{{url('proceedToPay')}}",
                    data: {
                    'fname':fname,
                    'lname':lname,
                    'phone':phone,
                    'address1':address1,
                    'address2':address2,
                    'city':city,
                    'state':state,
                    'pincode':pincode,
                    'tracking_no':tracking_no,
                    'totalPrice':totalPrice
                    },
                    dataType: "json",
                    success: function (response) {
                        window.location.href="/myorders";
                    }
                });
          });
        }
      }).render('#paypal-button-container');
    </script>
                            </div>
                    </div>
                


            </div>
     
        </section>
  
    @endsection
