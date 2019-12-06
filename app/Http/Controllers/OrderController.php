<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function newOrder(){
        $orders  = DB::table('orders')
                    ->join('customers','orders.customer_id', '=',    'customers.id')
                    ->join('payments','orders.id',           '=',    'payments.order_id')
                    ->orderBy('orders.id','desc')
                    ->get();

        return view('admin.order.manage-order',['orders' => $orders]);
    }

    public function orderDetails($id){
        $order      =   Order::find($id);
        $customer   =   Customer::find($order->customer_id);
        $shipping   =   Shipping::find($order->shipping_id);
        $payment    =   Payment::where('order_id',$id)->first();
        $products   =   OrderDetails::where('order_id',$id)->get();

        return view('admin.order.order-details',[
                'order'         =>   $order,
                'customer'      =>   $customer,
                'shipping'      =>   $shipping,
                'payment'       =>   $payment,
                'products'      =>   $products

            ]);
    }
}
