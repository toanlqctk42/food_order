@extends('BackEnd.master')
@section('title')
Coupon Code Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                <div class="card">
                    @if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <div class="card-header text-center">
                        Coupon Code Page
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save_coupon_code') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Code Name</label>
                                <input type="text" class="form-control" name="coupon_code">
                            </div>
                            <div class="form-group">
                                <label>Coupon Value</label>
                                <input type="number" class="form-control" name="coupon_value">
                            </div>
                            <div class="form-group">
                                <label>Cart Min Value</label>
                                <input type="number" class="form-control" name="cart_min_value">
                            </div>
                            <div class="form-group">
                                <label>Expired On</label>
                                <input type="date" class="form-control" name="expired_on">
                            </div>
                            <div class="form-group">
                                <label>Added On</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <label>Coupon Type</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_type" value="1">Persentage
                                    <input type="radio" name="coupon_type" value="0">Fixed
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Coupon Status</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_status" value="1">Active
                                    <input type="radio" name="coupon_status" value="0">Inactive
                                </div>
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Conpon Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection