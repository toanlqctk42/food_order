@extends('FrontEnd.master')

@section('title')
    Cart Show item
@endsection
@section('content')
    <div class="products">
        <div class="container ">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <h3 class="card-header text-center mt-3" style="background-color: lightyellow;width:auto;height:70px">
                        Cart Item
                    </h3>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Remove</th>
                                    <th scope="col" class="text-success">Dish Name</th>
                                    <th scope="col">Dish Image</th>
                                    <th scope="col">Dish Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Grand Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @php($sum = 0)
                                @foreach ($cartDish as $dish)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <th scope="row">
                                            <a href="{{ route('remove_item', ['rowId' => $dish->rowId]) }}" type="button"
                                                class="btn btn-danger">
                                                <span aria-hidden="true">x</span>
                                            </a>
                                        </th>
                                        <td>{{ $dish->name }}</td>
                                        <td><img src="{{ asset($dish->options->image) }}"
                                                style="height: 50px;width:50px; border-radius 50%"></td>
                                        @if ($dish->options->half_price == null)
                                            <td>{{ $dish->price }} $</td>
                                        @else
                                            <td>{{ $dish->options->half_price }} $</td>
                                        @endif
                                        <td>
                                            <form action="{{ route('update_cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $dish->rowId }}">
                                                <input type="number" name="qty" value="{{ $dish->qty }}"
                                                    style="width:50px;height:25px" min="1">
                                                <input type="submit" name="btn" class="btn btn-success" value="Update"
                                                    style="width:57px;height:25px;padding:0">
                                            </form>
                                        </td>
                                        @if ($dish->options->half_price == null)
                                            <td>{{ $subTotal = $dish->price * $dish->qty }} $</td>
                                        @else
                                            <td>{{ $subTotal = $dish->options->half_price * $dish->qty }} $</td>
                                        @endif
                                        <td>{{ $dish->$subTotal }}</td>
                                        <input type="hidden" value="{{ $sum = $sum + $subTotal }}">
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">{{ $sum }} $</td>
                                    <?php
                                    Session::put('sum', $sum);
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (Session::get('customer_id'&&'shipping_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/checkout/payment') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @elseif (Session::get('customer_id'))
                <div class="col-md-9 product-w3ls-right">
                    <a href="{{ url('/shipping') }}" class="btn btn-info" style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @else
                <div class="col-md-9 product-w3ls-right">
                    <a href="" data-toggle="modal" data-target="#login_or_register" class="btn btn-info"
                        style="float: right">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_or_register" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-auto">
                        <div class="card justify-content-center">
                            <div class="card-title">
                                <h3 class="text-center">Wellcome to Staple Foods</h3>
                            </div>
                            <div class="card-body">
                                <h4>Are you a new member...!</h4>
                                <a href="{{ route('sign_up') }}" class="btn-block btn-primary text-center"
                                    style="height: 60px;width:auto;padding-top:12px;magin-top:25px;font-size:25px">
                                    <span class="mt-5">
                                    </span>Register</a>

                                <h3 class="mt-lg-5 text-center">OR</h3>

                                <h4 class="mt-5">Already have an account...</h4>

                                <a href="{{ route('login_in') }}" class="btn-block btn-success text-center"
                                    style="height: 60px;width:auto;padding-top:12px;margin-top:10px;font-size:25px"><span
                                        class="mt-5">Login</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
