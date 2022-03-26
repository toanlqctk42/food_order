@extends('BackEnd.master')

@section('title')
    Order manage
@endsection

@section('content')
    {{-- show  message --}}
    @if (Session::get('sms'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- end show message --}}
    <div class="card my-5">
        <div class="card-header">
            <h3 class="card-title">Order Manage</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->order_total }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->payment_type }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                <a class="btn btn-outline-success mt-1"
                                    href="{{ route('view_order', ['order_id' => $order->order_id]) }}">
                                    <i class="fas fa-search" title="View Order Detail"></i></a>

                                <a class="btn btn-outline-info mt-1"
                                    href="{{ route('view_order_invoice', ['order_id' => $order->order_id]) }}">
                                    <i class="fas fa-search-plus" title="View Invoice"></i></a>

                                <a class="btn btn-outline-primary mt-1"
                                    href="{{ route('download_order_invoice', ['order_id' => $order->order_id]) }}">
                                    <i class="fas fa-arrow-circle-down" title="Download Invoice"></i></a>

                                </a>
                                <a class="btn btn-outline-danger mt-1" id="delete"
                                    href="{{ route('delete_order', ['order_id' => $order->order_id]) }}">
                                    <i class="fas fa-trash" title="click to destroy"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->
@endsection
