@extends('layouts.admin-dashboard')
@section('title', 'Order Detail')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Detail
            <small>Order Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/orders')}}"><i class="fa fa-file-text"></i> Order Management</a></li>
            <li class="active">Edit Order Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Order Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{url('/post-item-price/'.base64_encode($order_details->id))}}" name="edit_order_form" id="edit_order_form" role="form" method="post" >
                    {{csrf_field()}}
                    <!-- text input -->

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>Item name</th>
                                    <th>Quantity</th>
                                    <th>kg/liter</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($order_details->OrderTrans))
                                @foreach($order_details->OrderTrans as $details)
                                <tr>
                                    <td>  <input class="form-control" type="text" name="item_name" id="item_name" value="{{$details->item_name}}" readonly=""></td>
                                    <td> <input class="form-control"  type="text" name="item_quantity" id="item_quantity" value="{{$details->item_quantity}}" readonly=""></td>
                                    <td><input class="form-control"  type="text" name="item_mass" id="item_mass" value="{{$details->mass->mass_name}}" readonly=""></td>
                                     <td><input class="form-control"  type="text" name="item_price[{{$details->id}}]" id="item_price" value="{{$details->item_price}}" ></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>


                    @if($order_details->order_status<2)
                    <div class="box-footer">
                        <input type="hidden" name="order_id" id="order_id" value="{{base64_encode($order_details->id)}}"  />
                        <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                        <a class="btn btn-default" href="{{ url('/orders') }}">Cancel</a>
                    </div>
                    @endif
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js_content')
<script src="{{asset('/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/js/admin/edit_order.js')}}"></script>
@endsection
