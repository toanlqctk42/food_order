@extends('BackEnd.master')

@section('title')
    Dish manage
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
            <h3 class="card-title">Dish Manage</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Detail</th>
                        <th>Url Image</th>
                        <th>Added on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $dish->dish_name }}</td>
                            <td>{{ $dish->category_name }}</td>
                            <td>{{ $dish->dish_detail }}</td>
                            <td><img src="{{ asset($dish->dish_image) }}" style="height: 50px; width:50px" class="img-fluid img-thumbnail"></td>
                            <td>{{ $dish->created_at }}</td>
                            <td>
                                @if ($dish->dish_status == 0)
                                    <a class="btn btn-outline-success"
                                        href="{{ route('dish_active', ['dish_id' => $dish->dish_id]) }}">
                                        <i class="fas fa-arrow-up" title="click to Active"></i></a>
                                @else
                                    <a class="btn btn-outline-info"
                                        href="{{ route('dish_inactive', ['dish_id' => $dish->dish_id]) }}">
                                        <i class="fas fa-arrow-down" title="click to Inactive"></i></a>
                                @endif
                                <a type="button" class="btn btn-outline-dark" data-toggle="modal"
                                    href="#edit{{ $dish->dish_id }}">
                                    <i class="fas fa-edit" title="click to chang it"></i>
                                </a>
                                <a class="btn btn-outline-danger"
                                    href="{{ route('dish_delete', ['dish_id' => $dish->dish_id]) }}">
                                    <i class="fas fa-trash" title="click to destroy"></i></a>
                            </td>
                        </tr>

                        {{-- ============================== Modal start here =========================== --}}
                        <div class="modal fade" id="edit{{ $dish->dish_id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Dish Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update_dish') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="dish_name"
                                                    value="{{ $dish->dish_name }}">
                                                <input type="hidden" class="form-control" name="dish_id"
                                                    value="{{ $dish->dish_id }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id"class="form-control">
                                                    @foreach ($categories as $cate)
                                                        @if ($cate->category_id == $dish->category_id)
                                                        <option value="{{ $cate->category_id }}" selected>{{ $cate->category_name }}</option>
                                                        @else
                                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Detail</label>
                                                <textarea type="text" name="dish_detail" class="form-control" rows="5">{{ $dish->dish_detail }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Previous Image</label>
                                                <img src="{{ asset($dish->dish_image) }}" style="height: 150px; width:150px; border-radius:50%">
                                                <input type="file" class="form-control" name="dish_image" accept="image/*">
                                            </div>
                                            <div class="card">
                                                <div class="card-header" title="You can skip this">Dish Attribute</div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="full" value="{{ $dish->full }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="full_price" value="{{ $dish->full_price }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="half" value="{{ $dish->half }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="half_price" value="{{ $dish->half_price }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-primary btn-block" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ============================== Modal end here =========================== --}}
                    @endforeach
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->
@endsection
