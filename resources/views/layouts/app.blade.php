<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AdminLTE 3 | Starter')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">S.ADMIN</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <li @class(['nav-item'])>
                            <a href="{{route('users.index')}}" @class(['nav-link', 'active'=> Route::is('users.*')])>
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <span class="badge badge-danger right">{{ \App\Models\User::count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li @class(['nav-item'])>
                            <a href="{{route('orders.index')}}" @class(['nav-link', 'active'=> Route::is('orders.*')])>
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Orders
                                    <span class="badge badge-danger right">{{ \App\Models\Order::count() }}</span>
                                </p>
                            </a>
                        </li>

                        <li @class(['nav-item'])>
                            <a href="{{route('pizzas.index')}}" @class(['nav-link', 'active'=> Route::is('pizzas.*')])>
                                <i class="nav-icon fas fa-pizza-slice"></i>
                                <p>
                                    Pizzas
                                    <span class="badge badge-danger right">{{ \App\Models\Pizza::count() }}</span>
                                </p>
                            </a>
                        </li>

                        <li @class(['nav-item'])>
                            <a href="{{route('toppings.index')}}" @class(['nav-link', 'active'=> Route::is('toppings.*')])>
                                <i class="nav-icon fas fa-bacon"></i>
                                <p>
                                    Toppings
                                    <span class="badge badge-danger right">{{ \App\Models\Topping::count() }}</span>
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumb')
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>