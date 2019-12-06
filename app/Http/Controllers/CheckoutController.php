<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('front.checkout.checkout');
    }
    public function newCustomer(Request $request){
        $customer   =   new     Customer();


        $customer->first_name        =   $request->first_name;
        $customer->last_name         =   $request->last_name;
        $customer->email_address     =   $request->email_address;
        $customer->password          =   $request->password;
        $customer->phone_number      =   $request->phone_number;
        $customer->address           =   $request->address;

        $customer->save();
        $customerName   =   $customer->first_name.' '.$customer->last_name;


        Session::put('customerName',$customerName);
        Session::put('customerId',$customer->id);


        return view('front.checkout.shipping-info');
    }

    public function newShipping(Request $request){
        $shipping   =   new Shipping();

        $shipping->full_name         =   $request->full_name;
        $shipping->email_address     =   $request->email_address;
        $shipping->phone_number      =   $request->phone_number;
        $shipping->address           =   $request->address;
        $shipping->save();


        Session::put('shippingId',$shipping->id);


        return redirect('/payment-info');

    }

    public function paymentInfo(){
        return view('front.checkout.payment-info');
    }
}
