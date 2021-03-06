@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Category</li>
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
                            <th>Parent Id</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>name</th>
                            <th>Description</th>
                            <th>Parent Id</th>
                            <th>publication_status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->parent_id}}</td>
                                <td>{{$category->publication_status}}</td>
                                <td>

                                    <a href="{{route('edit-category',['id'  =>$category->id])}}" class="btn btn-info btn-sm">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger btn-xs">
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

