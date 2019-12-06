<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Payment;
use Illuminate\Http\Request;
use Session;
use Cart;

class OrderDetailsController extends Controller
{
    public function newOrderDetails(Request $request){
        $order  =   new Order();
        $order->customer_id =   Session::get('customerId');
        $order->shipping_id =   Session::get('shippingId');
        $order->order_total =   Session::get('total');
        $order->save();


        $cartProducts   = Cart::Content();
        foreach ($cartProducts as $cartProduct) {
            $orderDetails   =   new OrderDetails();
            $orderDetails->order_id             = $order->id;
            $orderDetails->product_id           = $cartProduct->id;
            $orderDetails->product_name         = $cartProduct->name;
            $orderDetails->product_price        = $cartProduct->price;
            $orderDetails->product_quantity     = $cartProduct->qty;
            $orderDetails->save();
        }

        $payment    =   new Payment();
        $payment->order_id          =   $order->id;
        $payment->payment_method    =   $request->payment_type;
        $payment->save();

        Cart::destroy();

        return redirect('/confirm-order');


    }

    public function confirmOrder(){
        return view('front.checkout.confirm-order');
    }
}
