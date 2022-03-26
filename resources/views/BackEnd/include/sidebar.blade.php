@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/home') }}" class="brand-link">
        <img src="{{ asset('BackEndSourceFile') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Site Logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('BackEndSourceFile') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                {{-- ======================Category Start here ======================= --}}
                <li class="nav-item has-treeview {{ ($prefix=='/category')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_cate_table') }}" class="nav-link {{ ($route=='show_cate_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_cate') }}" class="nav-link {{ ($route=='manage_cate')?'active':'' }}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ======================Category End here ========================= --}}

                {{-- ======================Delivery Start here ======================= --}}
                <li class="nav-item has-treeview {{ ($prefix=='/delivery_boy')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-solid fa-truck nav-icon"></i>
                        <p>
                            Delivery Boy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_deliveryBoy_add_table') }}" class="nav-link {{ ($route=='show_deliveryBoy_add_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Delivery Boy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('delivery_boy_manage') }}" class="nav-link {{ ($route=='delivery_boy_manage')?'active':'' }}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Delivery Boy</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ======================Delivery End here ========================= --}}

                {{-- ======================Coupon Start here ========================= --}}
                <li class="nav-item has-treeview {{ ($prefix=='/coupon')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-tag"></i>
                        <p>
                            Coupon Code
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_coupon_table') }}" class="nav-link {{ ($route=='show_coupon_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Coupon Code</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_coupon_code') }}" class="nav-link {{ ($route=='manage_coupon_code')?'active':'' }}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Coupon Code</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ======================Coupon End here =========================== --}}

                {{-- ======================Dish Start here =========================== --}}
                <li class="nav-item has-treeview {{ ($prefix=='/dish')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-bars"></i>
                        <p>
                            Dish
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_dish_table') }}" class="nav-link {{ ($route=='show_dish_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Genarate Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_dish_table') }}" class="nav-link {{ ($route=='manage_dish_table')?'active':'' }}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Dish</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ======================Dish End here ============================= --}}

                {{-- ======================Order Start here ========================== --}}
                <li class="nav-item has-treeview {{ ($prefix=='/order')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-bars"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_dish_table') }}" class="nav-link {{ ($route=='show_dish_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Genarate Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('show_order') }}" class="nav-link {{ ($route=='show_order')?'active':'' }}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Order</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ======================Order End here ============================ --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
