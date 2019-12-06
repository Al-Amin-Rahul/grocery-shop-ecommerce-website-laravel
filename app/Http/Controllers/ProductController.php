<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $categories =   Category::where('publication_status',1)->get();
        $brands     =   Brand::where('publication_status',1)->get();
        return view('admin.product.add-product',[
            'categories'    =>   $categories,
            'brands'        =>   $brands,
        ]);
    }

    public function newProduct(Request $request){
        $product    =   new Product();


        $productImage   =   $request->file('product_image');
        $directory='product-images/';
        $imageName=$productImage->getClientOriginalName();
        $productImage->move($directory,$imageName);



        $imageUrl=$directory.$imageName;

        $product->product_name  =   $request->product_name;
        $product->category_id  =   $request->category_id;
        $product->brand_id  =   $request->brand_id;
        $product->product_code  =   $request->product_code;
        $product->product_price  =   $request->product_price;
        $product->product_skew  =   $request->product_skew;
        $product->short_description  =   $request->short_description;
        $product->long_description  =   $request->long_description;
        $product->publication_status  =   $request->publication_status;
        $product->product_image  =   $imageUrl ;
        $product->save();

        return redirect('/add-product')->with('message','Product Add Successful');
    }

    public function manageProduct(){
        $products   = Product::all();
        return view('admin.product.manage-product',['products'  =>  $products]);
    }
    public function editProduct($id){
        $product    = Product::find($id);
        $categories = Category::all();
        $brands     = Brand::all();
        return view('admin.product.edit-product',[
            'product'     => $product,
            'categories'  => $categories,
            'brands'      => $brands,
        ]);
    }

    public function updateProduct(Request $request){

    }
}
