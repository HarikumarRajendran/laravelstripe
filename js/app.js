var BaseURL = 'http://localhost/Sumanas/';

$tknVl = $('input[name=_token]').val();

$(document).ready(function(){

$('#payment-form').on('submit', function(e){

	e.preventDefault();
	$Err = 0;
	$cardName = $(".card-name").val(), $cardNo = $(".card-number").val(), 
	$cardCVV = $(".card-cvv").val(), $cardMonth = $(".card-expiry-month").val(),
	$cardYear = $(".card-expiry-year").val(), $id = $("#PrdId").val();

	if($cardName == '' || $cardNo == '' || $cardCVV == '' || $cardMonth == '' || $cardYear == ''){

		$Err = 1;
		$('.err').html('Please fill the details!');
		return false;
	}

	if(!$Err){
		$('.err').html('');
		Stripe.setPublishableKey($("#payment-form").data('stripe-publishable-key'));
        Stripe.createToken({
	        number: $('.card-number').val(),
	        cvc: $('.card-cvc').val(),
	        exp_month: $('.card-expiry-month').val(),
	        exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
 
	}

});


function stripeResponseHandler(status, response) {
    if (response.error) {
        $('.err').html('Please enter correct details!');
    } else {
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        $("#payment-form").find('input[type=text]').empty();
        $("#payment-form").append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $("#payment-form").get(0).submit();
    }
}



});