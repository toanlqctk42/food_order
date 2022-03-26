<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
            <div class="card">
                <div class="card-header p-4">
                    <a class="pt-2 d-inline-block" href="{{ url('/') }}" data-abc="true">Stamp Food</a>
                    <div class="float-right">
                        <h3 class="mb-0">Invoice {{ $order->order_id }}</h3>
                        Date: {{ $order->created_at }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">From:</h5>
                            <h3 class="text-dark mb-1">Staple Food</h3>
                            <div>29, Singla Street</div>
                            <div>Sikeston,New Delhi 110034</div>
                            <div>Email: contact@bbbootstrap.com</div>
                            <div>Phone: +91 9897 989 989</div>
                        </div>
                        <div class="col-sm-6 ">
                            <h5 class="mb-3">To:</h5>
                            <h3 class="text-dark mb-1">{{ $customer->name }}</h3>
                            <div>{{ $shipping->address }}</div>
                            <div>Email: {{ $customer->email }}</div>
                            <div>Phone: {{ $customer->phone_number }}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th class="right">Price</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                    $sum = 0;
                                @endphp
                                @foreach ($order_details as $orderD)
                                <tr>
                                    <td class="center">{{ $i++ }}</td>
                                    <td class="left strong">{{ $orderD->dish_name }}</td>
                                    <td class="right">{{ $orderD->dish_price }}</td>
                                    <td class="center">{{ $orderD->dish_qty }}</td>
                                    <td class="right">{{ $total = $orderD->dish_price*$orderD->dish_qty }} $</td>
                                </tr>
                                @php($sum += $total )
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Total</strong>
                                        </td>
                                        <td class="right">{{ $sum }} $</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">Staple Food, Sounth Block, New delhi, 110034</p>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
