<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        $categories =   Category::where('parent_id',0)->get();
        return view('admin.category.add-category',[
            'categories'   =>  $categories,
        ]);
    }
    public function manageCategory(){
        $categories =   Category::all();
        return view('admin.category.manage-category',['categories'=>$categories]);
    }
    public function storeCategory(Request $request){
        $category   =   new Category();
        $category->category_name    =   $request->category_name;
        $category->category_description    =   $request->category_description;
        $category->parent_id    =   $request->parent_id;
        $category->publication_status    =   $request->publication_status;
        $category->save();
        return redirect('/add-category')->with('message','Success');

    }
    public function editCategory($id){
        $category   =   Category::find($id);
        return view('admin.category.edit-category',['category'  =>  $category]);
    }
    public function updateCategory(Request $request){
        $category   =   Category::find($request->id);
        $category->category_name            =   $request->category_name;
        $category->category_description     =   $request->category_description;
        $category->publication_status       =   $request->publication_status;
        $category->save();
        return redirect('/manage-category')->with('message','category updated');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/manage-category')->with('message','Delete Success');
    }
}
