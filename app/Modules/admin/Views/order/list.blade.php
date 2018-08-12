@extends('layouts.admin-dashboard')
@section('title', 'Order Management')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Management
            <small>List of all Order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover" id="order_list">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Item Quantity</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js_content')

<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.js') }}"></script>
<script src="{{ asset('js/admin/order_detail.js') }}"></script>
@endsection
