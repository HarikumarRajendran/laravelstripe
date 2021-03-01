<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product Details</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .err{
                color: red;
            }
            .alert-success{
                color: green;
            }

        </style>
    </head>
    <body>

        <div class="container">
  <h2 class="text-center"><strong>Product Details</strong></h2>
  <div class="row">
      

    <?php 
    if($Product){ 
    ?>

    <div class="col-md-3">Product Name</div>
      <div class="col-md-9">{{$Product->name}}</div>
      <div class="col-md-3">Product Price</div>
      <div class="col-md-9">Rs.{{$Product->price}}</div>
      <div class="col-md-3">Product Description</div>
      <div class="col-md-9">{{$Product->description}}</div>
      <div class='col-md-12 p-0 mt-5'>
      <div class='col-md-8'>
        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
        <div class="err"></div>
        <form class="form-horizontal" action='<?= route('post-make-payment') ?>' method="POST" id="payment-form" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
        {{ csrf_field() }}
        <input type="hidden" name="prdId" id="prdId" value="{{$Product->id}}">
        <input type="hidden" name="prdAmnt" id="prdAmnt" value="{{$Product->price}}">
        <div class='form-row'>
        <div class='col-md-9 form-group required'>
        <label class='control-label'>Name on Card</label>
        <input autocomplete='off' class='form-control card-name' size='20' type='text' name="card_name">
        </div>
        </div>
        <div class='form-row'>
        <div class='col-md-9 form-group required'>
        <label class='control-label'>Card Number</label>
        <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no" placeholder="0123-4567-8910">
        </div>
        </div>
        <div class='form-row'>
        <div class='col-md-3 form-group cvc required'>
        <label class='control-label'>CVV</label>
        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvvNumber">
        </div>
        <div class='col-md-3 form-group expiration required'>
        <label class='control-label'>Expiration</label>
        <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text' name="ccExpiryMonth">
        </div>
        <div class='col-md-3 mt-2 form-group expiration required'>
        <label class='control-label'> </label>
        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="ccExpiryYear">
        </div>
        </div>
        <div class='form-row'>
        <div class='col-md-3 form-group'>
        <button class='form-control btn btn-success submit-button' type='submit'>Pay »</button>
        </div>
        </div>

        </form>
      </div>
 
<?php 
    } 
?>
  </div>


</div>

    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="<?= asset('js/app.js') ?>"></script>