@extends('admin.master')
@section('body')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Category</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                </div>
            <div class="card-body">

                <form class="offset-3 col-sm-6" action="{{route('update-category')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category_name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                            <input type="hidden" class="form-control" name="id" value="{{$category->id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category_description">Description:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category_description" value="{{$category->category_description}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="publication_status"></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" checked>Published
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="0">Unpublished
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

