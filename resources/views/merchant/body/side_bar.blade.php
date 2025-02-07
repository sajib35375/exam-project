@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route=='merchant.dashboard')?'active':'' }}">
                <a href="{{ route('merchant.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Store</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='root.add.store')?'active':'' }}"><a href="{{ route('root.add.store') }}"><i class="ti-more"></i>Add new Store</a></li>
                    <li class="{{ ($route=='root.store.list')?'active':'' }}"><a href="{{ route('root.store.list') }}"><i class="ti-more"></i>Store List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='root.store.category')?'active':'' }}"><a href="{{ route('root.store.category') }}"><i class="ti-more"></i>Add new Category</a></li>
                    <li class="{{ ($route=='root.category.list')?'active':'' }}"><a href="{{ route('root.category.list') }}"><i class="ti-more"></i>All Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route=='root.product')?'active':'' }}"><a href="{{ route('root.product') }}"><i class="ti-more"></i>Add new product</a></li>
                    <li class="{{ ($route=='root.product.list')?'active':'' }}"><a href="{{ route('root.product.list') }}"><i class="ti-more"></i>Product List</a></li>

                </ul>
            </li>



        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
