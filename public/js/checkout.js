// Stripe.setPublishableKey('pk_test_51HCjO8AWmj4NL1IjVJb28Bn20KY6jEXaYilmfwihtPWiYXSWAZZz98tFGdQHMMshNNDX5s8RlDNfIwtz3dLNV4PT00afpYygn3');
$(function(){

    var stripe = Stripe('pk_test_51HCjO8AWmj4NL1IjVJb28Bn20KY6jEXaYilmfwihtPWiYXSWAZZz98tFGdQHMMshNNDX5s8RlDNfIwtz3dLNV4PT00afpYygn3');

    var $form = $('#checkout-form');

    $form.submit(function(event) {
        $('#charge-error').addClass('hidden');
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken({
            number: $('#credit_card_number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#expiration_month').val(),
            exp_year: $('#expiration_year').val(),
            name: $('#card_holder_name').val()
        }, stripeResponseHandler);
        return false;
    });

    function stripeResponseHandler(status, response) {
        if(response.error) {
            $('#charge-error').removeClass('hidden');
            $('#charge-error').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));

            // Submit the form:
            $form.get(0).submit();
        }
    }
});