<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function manageBrand(){
        $brands =   Brand::all();
        return view('admin.brand.manage-brand',['brands'    =>  $brands]);
    }
    public function storeBrand(Request $request){
        $brand  =   new Brand();
        $brand->brand_name          =   $request->brand_name;
        $brand->brand_description   =   $request->brand_description;
        $brand->publication_status  =   $request->publication_status;
        $brand->save();
        return redirect('/add-brand')->with('message','Brand Add Success');
    }
    public function editBrand($id){
        $brand  =   Brand::find($id);
        return view('admin.brand.edit-brand',['brand'  =>  $brand]);
    }
    public function updateBrand(Request $request){
        $brand  =   Brand::find($request->id);
        $brand->brand_name          =   $request->brand_name;
        $brand->brand_description   =   $request->brand_description;
        $brand->publication_status  =   $request->publication_status;
        $brand->save();
        return redirect('/manage-brand')->with('message','Update Brand SuccessFull');
    }
    public function DeleteBrand($id){
        $brand  =   Brand::find($id);
        $brand->delete();
        return redirect('/manage-brand')->with('message','Delete Brand SuccessFull');
    }
}
