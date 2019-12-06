@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Product</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                {{Session::get('message')}}</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Category Id</th>
                            <th>Brand Id</th>
                            <th>Product Code</th>
                            <th>Product Price</th>
                            <th>Product Skew</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>publication_status</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Category Id</th>
                            <th>Brand Id</th>
                            <th>Product Code</th>
                            <th>Product Price</th>
                            <th>Product Skew</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>publication_status</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->category_id}}</td>
                                <td>{{$product->brand_id}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_skew}}</td>
                                <td>{{$product->short_description}}</td>
                                <td>{{$product->long_description}}</td>
                                <td>{{$product->publication_status}}</td>
                                <td>{{$product->product_image}}</td>
                                <td>

                                    <a href="{{route('edit-product',['id'   =>  $product->id])}}" class="btn btn-info btn-sm">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

@endsection


