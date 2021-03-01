<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function getIndex(){

    	$Data['Product'] = Product::all();        
        return view('ProductList')->with($Data);
        
    }

    public function postProductDetails(){

    	$id = request()->input('prdId');
    	$Data['Product'] = Product::find($id);        
        return view('ProductDetails')->with($Data);
        
    }

     public function postMakePayment(){ 

    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET') );
    	
    	try {
  
	        Stripe\Charge::create ( array (
	                "amount" => $request->input ( 'prdAmnt' ),
	                "currency" => "inr",
	                "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
	                "description" => "Test payment." 
	        ) );
		    
		    return redirect()->route('get-index')->with('SucMsg', 'Payment done successfully');;  
    	
    	} catch ( \Exception $e ) {
	    
	        return redirect()->route('get-index')->with('ErrMsg', 'Something went wrong!');;  
    	
    	}
        
    }
}
