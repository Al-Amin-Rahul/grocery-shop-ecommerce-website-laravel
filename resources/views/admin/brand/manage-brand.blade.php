@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Brand</li>
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
                            <th>Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>name</th>
                            <th>Description</th>
                            <th>publication_status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        {{$i=1}}
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>{{$brand->brand_description}}</td>
                            <td>{{$brand->publication_status}}</td>
                            <td>

                                <a href="{{route('edit-brand',['id' =>  $brand->id])}}" class="btn btn-info btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="{{route('delete-brand',['id' =>  $brand->id])}}" class="btn btn-danger btn-sm">
                                    <span class="fa fa-trash"></span>
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


