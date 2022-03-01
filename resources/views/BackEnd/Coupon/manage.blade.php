@extends('BackEnd.master')

@section('title')
    Coupon Code manage
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
            <h3 class="card-title">Coupon Code Manage</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Cart Min</th>
                        <th>Expired On</th>
                        <th>Added on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($coupons as $code)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $code->coupon_code }}</td>
                            <td>
                                @if ($code->coupon_type == 1)
                                    Precentage
                                @else
                                    Fixed
                                @endif
                            </td>
                            <td>{{ $code->coupon_value }}</td>
                            <td>{{ $code->cart_min_value }}</td>
                            <td>{{ $code->expired_on }}</td>
                            <td>{{ $code->added_on }}</td>
                            <td>
                                @if ($code->coupon_status == 0)
                                    <a class="btn btn-outline-success"
                                        href="{{ route('active_coupon_code', ['coupon_id' => $code->coupon_id]) }}">
                                        <i class="fas fa-arrow-up" title="click to Active"></i></a>
                                @else
                                    <a class="btn btn-outline-info"
                                        href="{{ route('inactive_coupon_code', ['coupon_id' => $code->coupon_id]) }}">
                                        <i class="fas fa-arrow-down" title="click to Inactive"></i></a>
                                @endif
                                <a type="button" class="btn btn-outline-dark" data-toggle="modal"
                                    href="#edit{{ $code->coupon_id }}">
                                    <i class="fas fa-edit" title="click to chang it"></i>
                                </a>
                                <a class="btn btn-outline-danger"
                                    href="{{ route('delete_coupon_code', ['coupon_id' => $code->coupon_id]) }}">
                                    <i class="fas fa-trash" title="click to destroy"></i></a>
                            </td>
                        </tr>

                        {{-- ============================== Modal start here =========================== --}}
                        {{-- <div class="modal fade" id="edit{{ $boy->delivery_boy_id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Delivery Boy</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('delivery_boy_update') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Delivery Boy Name</label>
                                                <input type="text" class="form-control" name="delivery_boy_name"
                                                    value="{{ $boy->delivery_boy_name }}">
                                                <input type="hidden" class="form-control" name="delivery_boy_id"
                                                    value="{{ $boy->delivery_boy_id }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="delivery_boy_phone_number"
                                                    value="{{ $boy->delivery_boy_phone_number }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- ============================== Modal end here =========================== --}}
                    @endforeach
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->
@endsection
