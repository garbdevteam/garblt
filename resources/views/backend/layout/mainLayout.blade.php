<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('images/LOGO1.png')}}" />

    {{-- <link rel="icon" href="{{url('backend/build/images/favicon.ico')}}" type="image/ico"/> --}}
    <title>الهيئة العامة للطرق والكباري والنقل البري</title>

    <!-- Bootstrap -->
    <link href="{{url('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{url('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('backend/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    {{-- <link href="{{url('backend/vendors/select2-new/select2.min.css')}}" rel="stylesheet"> --}}

    <!-- Custom Theme Style -->
    <link href="{{url('backend/build/css/custom.min.css')}}" rel="stylesheet">
    <style>
        svg {
            width: 100px;
            height: 100px;
            margin: 20px;
            display: inline-block;
        }

        .display-none {
            display: none !important;
        }

        .display-flex {
            display: flex !important;
        }
    </style>
    @yield('head')
</head>
<!-- /header content -->

<body class="nav-md">
    <div style="display: none;align-items: center;justify-content: center;height: 100vh;" id="loader">

        <svg version="1.1" id="L3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <circle fill="none" stroke="#fff" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;" />
            <circle fill="#fff" stroke="#e74c3c" stroke-width="3" cx="8" cy="54" r="6">
                <animateTransform attributeName="transform" dur="2s" type="rotate" from="0 50 48" to="360 50 52"
                    repeatCount="indefinite" />

            </circle>
        </svg>


    </div>

    <div class="container body" id="main-dev">
        <div class="main_container">
            <div class="col-md-3 left_col hidden-print" id="navbar">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{route('admin.home')}}" class="site_title"><span>لوحة التحكم</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info" style="width:100%;">
                            <span>أسم المستخدم,</span>
                            <h2>{{auth()->user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('backend.layout.sidemenu')
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav hidden-print">
                <div class="nav_menu" style="padding-top: 6px; !important">
                    <nav>
                        <div class="nav toggle" style="padding-top:6px;padding-bottom:4px;">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                    aria-expanded="false"
                                    style="padding-top:0px !important; padding-bottom:0px !important;">
                                    <a data-toggle="tooltip" data-placement="top" title="تكبير"
                                        onclick="toggleFullScreen();"
                                        style="padding-top:10px !important; display:inline !important;">
                                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn"
                                        style="padding-top:10px !important; display:inline !important;">
                                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                    </a>
                                    <a data-toggle="tooltip" data-placement="top" title="خروج"
                                        href="{{ route('admin.logout') }}"
                                        style="padding-top:10px !important; display:inline !important;" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                    </a>


                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                </a>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- /header content -->

            <!-- page content -->
            @yield('main')
            <!-- /page content -->

            <!-- footer content -->
            <footer class="hidden-print">
                <div class="pull-right">
                    <p>حقوق النسخ © 2020-{{date('Y')}} الهيئة العامة للطرق والكباري والنقل البري - مصر </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
    </div>



    <div id="lock_screen">
        <table>
            <tr>
                <td>
                    <div class="clock"></div>
                    <span class="unlock">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                            <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                </td>
            </tr>
        </table>
    </div>


    <!-- jQuery -->
    <script src="{{url('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('backend/vendors/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{url('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('backend/vendors/iCheck/icheck.min.js')}}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{url('backend/vendors/moment/min/moment.min.js')}}"></script>

    <script src="{{url('backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Chart.js -->
    {{-- <script src="{{url('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script> --}}
    <!-- jQuery Sparklines -->
    {{-- <script src="{{url('backend/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script> --}}
    <!-- gauge.js -->
    {{-- <script src="{{url('backend/vendors/gauge.js/dist/gauge.min.js')}}"></script> --}}
    <!-- Skycons -->
    {{-- <script src="{{url('backend/vendors/skycons/skycons.js')}}"></script> --}}
    <!-- Flot -->
    {{-- <script src="{{url('backend/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{url('backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('backend/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('backend/vendors/Flot/jquery.flot.resize.js')}}"></script> --}}
    <!-- Flot plugins -->
    {{-- <script src="{{url('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{url('backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{url('backend/vendors/flot.curvedlines/curvedLines.js')}}"></script> --}}
    <!-- DateJS -->
    {{-- <script src="{{url('backend/vendors/DateJS/backend/build/production/date.min.js')}}"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="{{url('backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{url('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{url('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script> --}}
    {{-- <script src="{{url('backend/vendors/select2-new/select2.min.js')}}"></script> --}}

    <!-- Custom Theme Scripts -->
    <script src="{{url('backend/build/js/custom.js')}}"></script>
    @yield('js')
    {{-- <script>
        $(".btn:not(#HaltOFF, .notLoad)").click(function() {
            $( "#main-dev" ).addClass( "display-none" );
            $( "#loader" ).addClass( "display-flex" );
        });
        $("a").click(function(event){
            // Capture the href from the selected link...
            var link = this.href;
            console.log(link == "");
            if(!(link == "" || link == "#")){
                if($(this).attr("target") != "_blank" && !event.ctrlKey){
                    $( "#main-dev" ).addClass( "display-none" );
                    $( "#loader" ).addClass( "display-flex" );
                }

            }
        });

    </script> --}}
</body>

</html>
