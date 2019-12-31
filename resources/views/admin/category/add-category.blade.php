@extends('admin.master')
@section('body')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                {{Session::get('message')}}</div>
            <div class="card-body">

                <form class="offset-3 col-sm-6" action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category_name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category_description">Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="category_description" rows="4" style="resize: vertical"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="parent_id">Parent</label>
                        <div class="col-sm-10">
                            <select class="form-control"  name="parent_id" required>
                                <option value="0">Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
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
                            <button type="submit" class="btn btn-info btn-block">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
