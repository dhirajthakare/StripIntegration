@extends('include.header')

<div class="container mt-5">
   <div class="col-md-6 offset-md-3">
<h4>
    Subscription
</h4>   

<form id="payment-form">
    <div id="card-element">
      <!-- Elements will create input elements here -->
    </div>

    <!-- We'll put the error messages in this element -->
    <div id="card-element-errors" role="alert"></div>
    <button type="submit">Subscribe</button>
  </form>
</div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
let elements = stripe.elements();
let card = elements.create('card', { style: style });
card.mount('#card-element');
card.on('change', function (event) {
  displayError(event);
});
function displayError(event) {
  changeLoadingStatePrices(false);
  let displayError = document.getElementById('card-element-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
}
const btn = document.querySelector('#submit-payment-btn');
btn.addEventListener('click', async (e) => {
  e.preventDefault();
  const nameInput = document.getElementById('name');

  // Create payment method and confirm payment intent.
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: cardElement,
      billing_details: {
        name: nameInput.value,
      },
    }
  }).then((result) => {
    if(result.error) {
      alert(result.error.message);
    } else {
      // Successful subscription payment
    }
  });
});

</script>
@extends('include.footer')