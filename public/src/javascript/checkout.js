var stripe = Stripe('pk_test_9vQaJYxw1Q9x01fxZA4QNC6s00zVJq4RfN');

var form = $('#checkout-form');

$('form').submit(function(){
    $('#charge-error').addClass('hidden');
    $('form').find('button').prop('disabled', true);
    stripe.createToken({
        card_holder: $('#card-holder'),
        expiration_year: $('#expiration-year'),
        expiration_month: $('#expiration-month'),
        card_number: $('card-number'),
        cvc: $('cvc')
    }, handler);

    return false;
});

function handler(status, response)
{
    if(response.error){
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    }else{
        var token = response.id;
        $('form').append($('<input type="hidden" name="stripeToken"/>').val(token));
        $('form').get(0).submit();
    }
}