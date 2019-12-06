@extends('front.master')
@section('body')
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                            <tr>
                                @php($total =   0)
                                @foreach($carts as $cart)
                                <td>
                                    <img src="{{asset($cart->options->image)}}" alt="" width="80">
                                </td>
                                <td>{{$cart->name}}</td>
                                <td>BDT {{$cart->price}}</td>
                                <td>
                                    <form action="" method="post">
                                        <input class="cart-qty" type="number" name="cart_qty" value="{{$cart->qty}}" />
                                        <input class="btn btn-secondary btn-sm" type="submit" name="update" value="Update" />
                                    </form>

                                </td>
                                <td class="text-right">BDT {{$price =   $cart->price * $cart->qty}}</td>
                                <td class="text-right">
                                    <form action="{{route('remove')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{$cart->rowId }}">
                                        <input class="btn btn-sm btn-danger" type="submit" name="submit" value="Remove" onclick="return confirm('Are you Sure')">
                                    </form>
                                </td>
                            </tr>
                            <input type="hidden" value="{{$total    =   $total+$price}}">
                            {{Session::put('total',$total)}}
                            @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total </strong></td>
                            <td class="text-right">
                                <strong>BDT {{$total}}</strong>
                            </td>

                            <td class="text-right">
                                <a href="{{route('destroy')}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure')">Remove All</a>
                            </td>
                        </tr>
                        </tbody>

                    </table>

                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <a href="{{ route("/") }}" class="btn btn-block btn-danger">Continue Shopping</a>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                @if(Session::get('customerId') && Session::get('shippingId'))
                                     <a href="{{route('payment-info')}}" class="btn btn-block btn-success text-uppercase ">Checkout</a>
                                @elseif(Session::get('customerId'))
                                     <a href="{{route('shipping-info')}}" class="btn btn-block btn-success text-uppercase ">Checkout</a>
                                @else
                                     <a href="{{route('checkout')}}" class="btn btn-block btn-success text-uppercase ">Checkout</a>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cart is empty</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
{{--    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="col-md-3">Name</div>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <input type="text" name="name" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="col-md-3">Phone</div>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <input type="number" name="phone" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="col-md-3">Password</div>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <input type="password" name="password" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

