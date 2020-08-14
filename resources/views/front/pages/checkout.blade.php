@extends('layouts.app')
@section('title')
   السلة 
@endsection
@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="card text-white  p-0">
                    <div class="card-header bg-gradient-lime p-1 shadow-sm">
                       <h6><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> طلبك </h6> 
                    </div>
                </div>
                 <cart :carts="{{json_encode(Cart::content())}}" :total="{{Cart::total()}}" ></cart>        
            </div>
            <div class="col-md-8">
                <form action="/checkout" method="post" id="payment-form">
                    @csrf
                      <div class="row text-right">
                             <div class="col-12">
                                 <div class="row">
                                     <div class="col-6">
                                         <div class="form-group">
                                             <label>الاسم</label>
                                             <input type="text" class="form-control valid" name="name" value="{{auth()->user()->name}}" aria-invalid="false" readonly>
                                         </div>
                                     </div>
                                     <div class="col-6">
                                         <div class="form-group">
                                             <label>الريد الالكتروني</label>
                                             <input type="text" class="form-control" value="{{auth()->user()->email}}" name="email" readonly>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-6">
                                         <div class="form-group">
                                             <label>العنوان</label>
                                             <input type="text" class="form-control valid" name="address" value="" aria-invalid="false">
                                         </div>
                                     </div>
                                     <div class="col-6">
                                         <div class="form-group">
                                             <label>الشارع</label>
                                             <input type="text" class="form-control" name="street" value="">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                             <label>رقم الهاتف</label>
                                             <input type="text" class="form-control valid" name="phone_number"  value="" aria-invalid="false">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                             <label>معلومة للسائق</label>
                                             <textarea class="form-control"name="note_for_driver"></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-row">
                                   <label for="card-element">
                                           Credit or debit card
                                   </label>
                                   <div id="card-element" style="width: -webkit-fill-available;">
                                     <!-- A Stripe Element will be inserted here. -->
                                   </div>
                                      <!-- Used to display Element errors. -->
                                 <div id="card-errors" role="alert"></div>
                                </div>
                                <button class="btn btn-primary btn-sm shadow-sm">ادفع</button>
                             </div>
                         </div>
                  </form>
            </div>
        </div>
    </div>
   @push('scripts')
       <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_iK9QAPTRsZLwgva3Y6Y9fPgC00flT4D6Lx');
        
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
        card.addEventListener('change', function(event) {
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
        @endpush     
@endsection