@extends('FrontEnd.master')

@section('title')
    Shipping
@endsection

@section('content')
    <!-- shipping-page -->
    <div class="login-page about">
        <img src="{{ asset('/') }}FrontEndSourceFile/images/img3.jpg" alt="" class="login-w3img">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Enter Your Shipping Information</h3>
            <p class="w3ls-title w3ls-title1 text-center">You can change your shipping information</p>
            <div class="login-agileinfo">
                <form action="{{ route('shipping_store') }}" method="post">
                    @csrf
                    <label>Full Name</label>
                    <input class="agile-ltext" type="text" name="name" placeholder="Username"
                    value="{{ $customer->name }}">
                    <label>Email</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email"
                    value="{{ $customer->email }}">
                    <label>Phone Number</label>
                    <input class="agile-ltext" type="text" name="phone_number" placeholder="Your Phone Number"
                    value="{{ $customer->phone_number }}">
                    <label>Address</label>
                    <input class="agile-ltext" type="text" name="address" placeholder="Enter your Address ...">
                    <div class="wthreelogin-text">
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </div>
    <!-- //shipping-page -->
@endsection
