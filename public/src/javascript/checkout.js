var stripe = Stripe('pk_test_9vQaJYxw1Q9x01fxZA4QNC6s00zVJq4RfN');
var elements = stripe.elements();
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
    var displayError = document.getElementById('charge-error');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });
  
  // Handle form submission.
  var form = document.getElementById('checkout-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();
  
    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('charge-error');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });
// var form = $('#checkout-form');

// $('form').submit(function(){
//     $('#charge-error').addClass('hidden');
//     $('form').find('button').prop('disabled', true);
//     var el = {
//         card_holder: $('#card-holder').val(),
//         expiration_year: $('#expiration-year').val(),
//         expiration_month: $('#expiration-month').val(),
//         card_number: $('#card-number').val(),
//         cvc: $('#cvc').val()
//     };
//     console.log(el);
//     stripe.createToken(el).then(function(result) {
//         if (result.error) {
//           // Inform the user if there was an error.
//           var errorElement = document.getElementById('charge-error');
//           errorElement.textContent = result.error.message;
//         } else {
//           // Send the token to your server.
//           stripeTokenHandler(result.token);
//         }
//       });

//     return false;
// });

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('checkout-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
  }