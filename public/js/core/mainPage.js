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
      $(document).on('click','.qty-up',function (e) { 
          e.preventDefault();
          var inc_val = parseInt($(this).closest('.product-Data').find('.qty').val(), 10);
          inc_val = isNaN(inc_val) ? 0 : inc_val;
          if (inc_val >= 1 && inc_val <= 10) {
              inc_val++;
              $(this).closest('.product-Data').find('.qty').val(inc_val);
          }
      });

      //
      $(document).on('click','.qty-down',function (e) { 
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
      $('.rating-css input + label').click(function (e) { 
          // e.preventDefault();
          var starNum=$(this).prev("input[type='radio']").val();
          var prodId=$('.prodId').val();
          
          $.ajax({
              type: "POST",
              url: "{{url('addRating')}}",
              data:{'product_rating':starNum,'prodId':prodId},
              dataType: "json",
              success: function (response) {
              // window.location.reload();
              if(response.LoginPurchase){
                  swal.fire(response.LoginPurchase)
                  $("input[type='radio']").prop('checked', false);
                  $('.rating-css .prodRating1 + label ~ label').css('color','#b4afaf');
              }
              else{window.location.reload();}
              }
          });
      });

      //
    

      $('.deleteComment').click(function (e) { 
          e.preventDefault();
          var comment_id=$('.comment_id').val();
          $.ajax({
              type: "POST",
              url: "{{url('deleteComment')}}",
              data: {'comment_id':comment_id},
              dataType: "json",
              success: function (response) {
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
      $(document).on('click','.btn-deleteCart',function (e) { 
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
                  $('.cart_items').load(location.href +" .cart_items");
                  $('.navbar').load(location.href +" .navbar");
                  swal.fire("", response.status, "success");
                  // alert('s');
              }
          });

      });


      //
      $(document).on('click','.changeQty',function (e) { 
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
                  $('.container').load(location.href +" .container");
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


      $(document).on('click','.btn-deleteWishlist',function (e) { 
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
                  $('.wishlistItems').load(location.href +" .wishlistItems");
                  loadwishlist();
                  swal.fire("", response.status, "success");
                  // alert('s');
              }
          });

      });
      //
      function loadwishlist(){
        $.ajax({
          type: "GET",
          url: "{{ url('wishlistCount') }}",
          success: function (response) {
            $('.wishlistCount').text(response.count);
          }
        });
      }
      



      //
      $('.Razorpay-btn').click(function (e) { 
          e.preventDefault();
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
          var fname_error,lname_error,phone_error,address1_error,address2_error,city_error,state_error,pincode_error,tracking_no_error;
          if(!fname){
              fname_error="First Name is Required";
              $('#fname').html(fname_error);
          }else{fname_error="";
              $('#fname').html('');
          }
          if(!lname){
              lname_error="Last Name is Required";
              $('#lname').html(lname_error);
          }else{lname_error="";
              $('#lname').html('');
          }
          if(!phone){
              phone_error="phone Name is Required";
              $('#phone').html(phone_error);
          }else{phone_error="";
              $('#phone').html('');
          }
          if(!address1){
              address1_error="Address 1 Name is Required";
              $('#address1').html(address1_error);
          }else{address1_error="";
              $('#address1').html('');
          }
          if(!address2){
              address2_error="Address 2 Name is Required";
              $('#address2').html(address2_error);
          }else{address2_error="";
              $('#address2').html('');
          }
          if(!city){
              city_error="First Name is Required";
              $('#city').html(city_error);
          }else{city_error="";
              $('#city').html('');
          }
          if(!state){
              state_error="State Name is Required";
              $('#state').html(state_error);
          }else{state_error="";
              $('#state').html('');
          }
          if(!pincode){
              pincode_error="pincode Name is Required";
              $('#pincode').html(pincode_error);
          }else{pincode_error="";
              $('#pincode').html('');
          }
          if(!tracking_no){
              tracking_no_error="tracking_no Name is Required";
              $('#tracking_no').html(tracking_no_error);
          }else{tracking_no_error="";
              $('#tracking_no').html('');
          }
          if(fname_error!=null|| lname_error!=null|| phone_error!=null||address1_error!=null||address2_error!=null||city_error!=null||state_error!=null||pincode_error!=null||tracking_no_error!=null)
           {
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
                  //alert(response.totalPrice)
                  var options = {
                      "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                      "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                      "currency": "INR",
                      "name": "Acme Corp",
                      "description": "Test Transaction",
                      "image": "https://example.com/your_logo",
                      "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                      "handler": function (response){
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