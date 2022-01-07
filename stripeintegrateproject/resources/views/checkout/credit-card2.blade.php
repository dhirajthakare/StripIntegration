<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    @php
        $stripe_key = 'pk_test_51J00IdSI2FKZNGlQcBd9wOMRAlDrFv9D6pBqHyQXIcymNmgbq8Wgdhe4hTy6w7sIem1ZOVyPd1ZbocAY4oJETwlD00zOzfC8OH';
        // pk_live_51J00IdSI2FKZNGlQkt2zCzXoAkasJjdJDyAqbKYwuUjyInvFQzQYvGTeRVqk6uUy9a2SrcRGygvDU5bn1xXX9RQL00M1FVZBwv
    @endphp
    <div class="container" style="margin-top:6%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class=" col-md-7">
                <div class="">
                    <p>You will be charged &#8377; {{ $intent->amount/100}}</p>
                </div>
                <div class="card px-5 py-3">
                   @if(Session('success'))

                    
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{Session('success')}}</strong>
                        </div>
                   @endif
                    <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                        @csrf                    
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div>
                                    <strong>billing details</strong>
                                </div>
                                <hr>
                                <div class="mb-2">
                                    <label for="email">Email Address</label>
                                    <input type="text" required name="email" class="form-control" id="email" >
                                </div>
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" required name="name" class="form-control" id="name" >
                                </div>
                                <div class="mb-2">
                                    <label for="address">Address</label>
                                    <input type="text" required name="address" class="form-control" id="address" >
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="city">City</label>
                                        <input type="text" required name="city" class="form-control " id="city" >
                                    </div>
                                    <div class="col">
                                        <label for="state">State</label>
                                        <input type="text" required name="state" class="form-control " id="state" >
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="postalCode">Postal Code</label>
                                        <input type="text" required name="postalCode" class="form-control " id="postalCode" >
                                    </div>
                                    <div class="col">
                                        <label for="phone">Phone</label>
                                        <input type="text" required name="phone" class="form-control " id="phone" >
                                    </div>
                                </div>
                                <div>
                                    <strong>Payment Details</strong>
                                </div>
                                <hr>
                                <div class="mb-2">
                                    <label for="nameOnCard">Name</label>
                                    <input type="text" name="nameOnCard" class="form-control" id="nameOnCard" >
                                </div>
                                <label for="">Credit or debit Card</label>
                                <div class="mb-2 p-3" style="border: 1px rgb(206, 205, 205) solid" id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div class="text-danger" id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent->client_secret }}"
                        > Pay ( <span class="text-success">&#8377; {{ $intent->amount/100}}</span> ) </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
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
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.

        const cardElement = elements.create('card', { style: style,hidePostalCode:true }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
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
            document.getElementById('card-button').disabled=true;

            var Options = {
                name:$('#name').val(),
                address:{
                    city:$('#city').val(),
                    country:'IN',
                    line1:$('#address').val(),
                    postal_code:$('#postalCode').val(),
                    state:$('#state').val(),
            },
            phone:$('#phone').val(),
            email:$('#email').val()
            };

        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                     billing_details:Options 
                }
            })
            .then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    document.getElementById('card-button').disabled=false;

                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>