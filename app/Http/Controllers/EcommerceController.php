<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){
        $carts = Cart::content();
        $products   =   Product::where('publication_status',1)
                                ->orderBy('id','desc')
                                ->get();

//        $categories =   Category::where('publication_status',1)
//                                ->where('parent_id',0)
//                                ->orderBy('id','desc')
//                                ->get();
//        $sub_categories =   Category::where('publication_status',1)
//                                ->where('parent_id',)
//                                ->orderBy('id','desc')
//                                ->get();
        return view('front.home.home',[
            'products'     =>  $products,
//            'categories'   =>  $categories,
            'carts'        =>  $carts,
        ]);
    }
    public function productDetails($id){
        $product    =   Product::find($id);
        return view('front.product-details.product-details',['product'  =>  $product]);
    }
    public function Category($id){
        $products   =   Product::where('category_id',$id)->get();
        $category   =   Category::find($id);
        return view('front.category.category',[
            'products'   =>  $products,
            'category'   =>  $category,
        ]);
    }
}
