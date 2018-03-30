<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Stock Manager</title>
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
    <!-- Bootstrap 3.3.7 -->
    <!-- <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css"> -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <!-- <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css"> -->
    <!-- Pace style -->
    <!-- <link rel="stylesheet" href="../../plugins/pace/pace.min.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif] -->

    <!-- Google Font -->
    @include('inc.style')

</head>

<body class="skin-blue sidebar-mini sidebar-open" style="height: auto; min-height: 100%;">
    <div class="wrapper" style="height: auto; min-height: 100%;">


        @include('inc.header');

        <!-- Left side column. contains the logo and sidebar -->
        @include('inc.sidebar');
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 497.933px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                </h1>

            </section>

            <!-- Main content -->
            <section class="content">


                <!--/To Be Constructed-->
                @include('inc.messages')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Stock Manager</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap 3.3.7 -->
    <!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- FastClick -->
    <!-- <script src="../../bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../../dist/js/demo.js"></script> -->
    @include('inc.scripts')


</body>

</html>