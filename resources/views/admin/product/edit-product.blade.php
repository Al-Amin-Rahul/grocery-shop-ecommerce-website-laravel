@extends('admin.master')
@section('body')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                {{Session::get('message')}}</div>
            <div class="card-body">

                <form class="offset-1 col-sm-10" action="{{route('update-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" required>
                            <input type="hidden" class="form-control" name="product_name" value="{{$product->id}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category">Category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category">Brand:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1" name="brand_id" required>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="code">Code:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="price">Price:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="product_price" value="{{$product->product_price}}"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="price">Product Skew:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="product_skew" value="{{$product->product_skew}}"required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="description">Sort Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" rows="4" required>{{$product->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="product_feature"></label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" name="long_description" rows="4" required>{{$product->long_description}}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="publication_status" >Publication Status</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" {{$product->publication_status==1 ?'checked':''}} value="1" checked>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="publication_status" {{$product->publication_status==0 ?'checked':''}} value="0" required>No
                            </label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="banner">Image:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file border" name="product_image"  accept="image/*" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

