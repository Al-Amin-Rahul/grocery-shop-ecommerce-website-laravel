<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart($id){
        $product    =   Product::find($id);

        Cart::add(
            [
                'id'      => $product->id,
                'name'    => $product->product_name,
                'qty'     => 1,
                'price'   => $product->product_price,
                'weight'  => '0',
                'options' => [
                    'image'     => $product->product_image
                ]
            ]);
    }
    public function showCart(){
        $carts = Cart::content();
        return view('front.cart.show-cart',['carts' =>  $carts]);
    }
    public function remove(Request $request){
        $rowId   =  $request->rowId;
        Cart::remove($rowId);
        return redirect('/show-cart');

    }
    public function destroy(){
        Cart::destroy();
        return redirect('show-cart');
    }
}
