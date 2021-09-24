<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('ample/plugins/images/favicon.png') }}">
    <title>{{@$page_title}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ample/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> --}}
    <!-- Menu CSS -->
    <link href="{{ asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('ample/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('ample/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('ample/css/colors/megna-dark.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        @include('components.admin_header')
        <!-- ============================================================== -->
        @if(auth()->user()->role == 1)
        @include('components.admin_sidebar')
        @elseif(auth()->user()->role == 2)
        @include('components.instructor_sidebar')
        @endif
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">{{@$page_title}}</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            {{-- <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button> --}}
                            <ol class="breadcrumb">
                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                <li class="active">{{@$page_title}}</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                {{-- <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li><b>Choose other demos</b></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/varun.jpg') }}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/genu.jpg') }}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/ritesh.jpg') }}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/arijit.jpg') }}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/govinda.jpg') }}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/hritik.jpg') }}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/john.jpg') }}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset('ample/plugins/images/users/pawandeep.jpg') }}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {{date("Y")}} &copy; Quiz App </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <div class="modal fade bs-modal-lg" id="data_modal" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg all-modals">
           <div class="modal-content"></div>
       </div>
   </div>
   <div id="site_url" style="display: none;">{{url('/')}}</div>
   <div id="current_url" style="display: none;">{{URL::current()}}</div> 
   <script src="{{ asset('ample/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
   <!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('ample/bootstrap/dist/js/bootstrap.min.js') }}"></script>
   <!-- Menu Plugin JavaScript -->
   <script src="{{ asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

   {{-- <script src="{{ asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script> --}}
   <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
   <!--slimscroll JavaScript -->
   <script src="{{ asset('ample/js/jquery.slimscroll.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <!--Wave Effects -->
   <script src="{{ asset('ample/js/waves.js') }}"></script>
   <!-- Custom Theme JavaScript -->
   <script src="{{ asset('ample/js/custom.min.js') }}"></script>
   <!--Style Switcher -->
   <script src="{{ asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
   {{-- <script src="{{ asset('js/plugins.js') }}"></script> --}}
   <script src="{{ asset('js/global-script.js') }}"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
   <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
   <!-- Menu Plugin JavaScript -->
   <script src="{{asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
   <!--Counter js -->
   <script src="{{asset('ample/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
   <script src="{{asset('ample/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
   <!--slimscroll JavaScript -->
   <script src="{{asset('ample/js/jquery.slimscroll.js')}}"></script>
   <!--Wave Effects -->
   <!-- sparkline chart JavaScript -->
   <script src="{{asset('ample/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
   <!-- Custom Theme JavaScript -->
   <script src="{{asset('ample/js/footable-init.js')}}"></script>
   <!--Style Switcher -->
   <script src="{{asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

   <script type="text/javascript">
    $(document).ready( function () {
    if($('.datatable-custom').length > 0){
        $('.datatable-custom').DataTable(); 
    }
    } );
</script>
</body>

</html>
