
@extends('fontend/master')

@section('content')

<style type="text/css">
	.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>

		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">
					 <h3 class="text-center text-success well" style="font-size: 22px">You Have To give us product Paymetn Method.</h3>
					 <hr>
					<div class="form-row">
						 <div class="form-group col-md-8 col-md-offset-2 well">

                         <br>

                        
                          <form action="{{ route('Paymentpost') }}" method="post" accept-charset="utf-8" id="payment-form">
                          	@csrf


                          	<input type="hidden" value="{{ Cart::subtotal() }}" name="subtotal">
                          	<input type="hidden" value="{{ Cart::total() }}" name="total">
                          	<input type="hidden" value="{{ Cart::tax() }}" name="tax">
                          	<input type="hidden" value="{{ Cart::count() }}" name="count">

                          	<table class="table table-bordered">
                          		<thead>
                          			<tr>
                          				<th>Cash On Delivary <td><input type="radio" value="CashOnDelevery" name="payment" id="payment"></td></th>
                          				
                          			</tr>

                          			<tr>
                          				<th>Payment <td><input type="radio" value="Paypal" name="payment" id="payment"></td></th>
                          				
                          			</tr>

                          			

									{{-- <button>Submit Payment</button> --}}

                          			<tr>
                          				<th>Bikash <td><input type="radio" value="Bikash" name="payment" id="payment"></td></th>
                          				
                          			</tr>

                          			<tr>
                          				<th>Stripe <td><input type="radio" value="Stripe" name="payment" id="payment"></td></th>

                          				 <div class="form-row" style="display: none" id="card">
										    <label for="card-element">
										      Credit or debit card
										    </label>
										    <div id="card-element">
										      <!-- A Stripe Element will be inserted here. -->
										    </div>

										    <!-- Used to display form errors. -->
										    <div id="card-errors" role="alert"></div>
										  </div>
                          				
                          			</tr>

                          			<tr>
                          				<th colspan="2">
                          				<button type="submit" class="form-control">Order Submit</button>									
                          																		
                          				</th>

                          			</tr>
                          		</thead>
                          	
                          	</table>
                          	
                          </form>
						 
				
						 </div>

						
					</div>

							
				</div>
			</div>
	<!-- checkout -->	
		</div>
@endsection







@section('footer')
<script type="text/javascript">
	
	@if(Session::has('message'))
      var type = "{{ Session::get('alert-type','success') }}";
      switch(type){
      	case "success":
      	toastr.success("{{ Session::get('message') }}");
      	break;

      	case "error":
      	toastr.error("{{ Session::get('message') }}");
      	break;
      }
	@else

	@endif

	$(document).on('click','#payment',function(){
		var payment = $(this).val();

		if (payment=='Stripe') {
        $('#card').show();
		}else{

        $('#card').hide();

		}
	});



	//..............striped payment.........

	// Create a Stripe client.
var stripe = Stripe('pk_test_51HDTxYKJDCubtdTW1qsbVBWdIMGxDl9tE6c0JmqOIaD4hu78YSbRAW5mvbfi9Q5uq5Gy2pNUJI0Za4Zd99n5hHLU00HXdIITE4');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>

@endsection
