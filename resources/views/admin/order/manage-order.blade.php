@extends('admin.master')

@section('body')
    <br/>

    <div class=" panel panel-heading text-center text-uppercase font-weight-bold "
         style="font-family:cursive; background-color: darkorange; color: white">
        Order  Manage  Tables
    </div>
    <div class="row ">
        <div class="col-lg-12 ">
            <div class="panel panel-default ">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3 class="text-center text-danger" style="font-family: cursive"></h3>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead class="font-italic bg-primary">
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Order No</th>
                            <th class="text-center">Order Total</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center">Order Status</th>
                            <th class="text-center">Payment Type</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Action</th>
                        </tr>

                        </thead>

                        <tbody class=" text-center " style="font-family: cursive">

                        @php($i=1)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->first_name.' '.$order->last_name}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('order-details',['id'  =>  $order->id])}}" class="btn btn-info btn-xs" title="View Order Details">
                                        <span class="fa fa-box-open"></span>
                                    </a>
                                    <a href="" class="btn btn-primary btn-xs" title="Edit Order">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are sure delete this ??? ')">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>



                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


@endsection
