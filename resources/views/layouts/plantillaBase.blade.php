<!DOCTYPE html>
<html lang="en">
@routes
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Contable SOIN</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    <style>
        label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 16px; width: 100% }

        #empresa:hover{
            color: #4d72de;
        }
         .dataTables_filter label {
             width: 15pc !important;
         }
        .dataTables_filter label {
            margin-left: 20pc !important;
        }
    </style>

</head>

<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            @include('layouts.navigation')
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Bienvenido a SOCMAC.</span>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            Cerrar Sesion
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        @yield('contenido')

        <div class="footer" >
            <div>
                <strong>Copyright</strong> SOLUCIONES INTEGRALES SAS&copy; 2019-2020
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js')}}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{ asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{ asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{ asset('js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js')}}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- GITTER -->
<script src="{{ asset('js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{ asset('js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Toastr -->

<script src="{{ asset('js/Nueva carpeta/demo/datatables-demo.js')}}"></script>
<script src="{{ asset('js/Nueva carpeta/funciones.js')}}"></script>
<script src="{{ asset('js/Nueva carpeta/consorcios.js')}}"></script>
<script src="{{ asset('js/Nueva carpeta/consorciosEditar.js')}}"></script>
<script src="{{ asset('js/Nueva carpeta/jquery.validate.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

</body>

</html>
