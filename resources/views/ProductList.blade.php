<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product List</title>

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
            .prd-img{
                width: 100%;
            }

        </style>
    </head>
    <body>

        <div class="container">
  <h2 class="text-center"><strong>Product List</strong></h2>
  <?php

                        if(Session::has('ErrMsg'))  echo '<p class="err_msg">'.Session::get('ErrMsg').'</p>';

                        if(Session::has('SucMsg'))  echo '<p class="suc_msg">'.Session::get('SucMsg').'</p>';

                        ?>
  <div class="card-columns">

    <?php 
    if($Product){ 
        foreach ($Product as $sepProduct) {
    ?>
     <form action='<?= route('post-product-details') ?>' method="post">
    @csrf
    <input type="hidden" name="prdId" value="{{$sepProduct->id}}">
  <div class="card">
    <img class="card-img-top prd-img" src="<?= asset('images/Product.png') ?>" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">{{ $sepProduct->name }} - Rs.{{ $sepProduct->price }}</h4>
      <div class="text-center">
        <button class="btn btn-primary" type="submit" >Buy Now</button>
      </div>
    </div>
  </div>
  </form>
<?php 
    } 
    } 
?>


  </div>
</div>

    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= asset('js/app.js') ?>"></script>