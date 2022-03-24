<!DOCTYPE html>
<html>

<head>
    <title>Svarog Project | Testing platform for web developers</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/favicon_new.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets_sidebar/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,600,800" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/default.min.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/monokai-sublime.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">

    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>

<style type="text/css">
    .profile_img {
        width: 170px;
        height: 170px;
        object-fit: cover;
        margin: 10px auto;
        border: 10px solid #ccc;
        border-radius: 50%;
    }

    .hm-gradient {
        background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
    }

    .navbar .dropdown-menu a:hover {
        color: #616161 !important;
    }

    .darken-grey-text {
        color: #2E2E2E;
    }

    .teal {
        background-color: #009688 !important;
    }

    .badge {
        padding: .05em .2em !important;
        position: absolute;
    }

    /*  ul {
margin: 0px;
padding: 0px;
}*/
    .ck-content {
        border: #585858;
        background-color: #585858;
        /* position: relative; */
        padding-right: 15px;
    }

    /* .ck-content pre code {
        background: unset;
        padding: 0;
        border-radius: 0;
    }

    .ck.ck-editor__editable pre[data-language]:after {
        content: attr(data-language);
        position: absolute;
    }

    .ck.ck-editor__editable pre[data-language]:after {
        top: -1px;
        right: 10px;
        background: var(--ck-color-code-block-label-background);
        font-size: 10px;
        font-family: var(--ck-font-face);
        line-height: 16px;
        padding: var(--ck-spacing-tiny) var(--ck-spacing-medium);
        color: #fff;
        white-space: nowrap;
    } */

    .footer-section {
        background: #000;
        margin-top: 100px;
        position: relative;
    }

    .footer-cta {
        border-bottom: 1px solid #373636;
    }

    .single-cta i {
        color: #9d43ac;
        font-size: 30px;
        float: left;
        margin-top: 8px;
    }

    .cta-text {
        padding-left: 15px;
        display: inline-block;
    }

    .cta-text h4 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .cta-text span {
        color: #d4cbcb;
        font-size: 15px;
    }

    .footer-content {
        position: relative;
        z-index: 2;
    }

    .footer-pattern img {
        position: absolute;
        top: 0;
        left: 0;
        height: 330px;
        background-size: cover;
        background-position: 100% 100%;
    }

    .footer-text p {
        margin-bottom: 14px;
        font-size: 14px;
        color: #7e7e7e;
        line-height: 28px;
    }

    .footer-widget-heading h3 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 40px;
        position: relative;
    }

    .footer-widget-heading h3::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -15px;
        height: 2px;
        width: 50px;
        background: #ff5e14;
    }

    .footer-widget ul li {
        display: inline-block;
        float: left;
        width: 50%;
        margin-bottom: 12px;
    }

    .footer-widget ul li a:hover {
        color: #9d43ac;
    }

    .footer-widget ul li a {
        color: #878787;
        text-transform: capitalize;
    }

    .burger1 {
        top: 2px !important;
        right: 10px !important;
    }

    .copyright-area {
        background: #0e1425;
        padding: 20px 0;
    }

    .copyright-text p {
        margin: 0;
        font-size: 13px;
        color: #878787;
    }

    .copyright-text p a {
        color: #ff5e14;
    }

    .footer-menu li {
        display: inline-block;
        margin-left: 20px;
    }

    .footer-menu li:hover a {
        color: #9d43ac;
    }

    .footer-menu li a {
        font-size: 13px;
        color: #878787;
    }

    .nav-item .icons:hover {
        background-color: #541c78 !important;
    }

    .bg-black {
        background-color: #000;
    }

    .w-60 {
        width: 60%;
    }

    p .btn-success {
        background-color: #9d43ac !important;
    }

    .btn-success:hover {
        background-color: #9d43ac !important;
    }

    @media screen and (max-width: 400px) {
        .navbar-brand img {
            width: 240px !important;
        }
    }

    @media screen and (max-width: 1160px) {
        .logo_img {
            width: 300px !important;
        }

        .search_btn {
            display: none !important;
        }
    }

    @media screen and (max-width: 575px) {

        h1,
        h2 {
            font-size: 1.6rem !important;
        }
    }

    @media screen and (max-width: 767px) {
        .navbar-nav li a {
            display: flex;
        }

        .navbar-nav {
            width: 100%;
        }
    }

    #button_top {
        display: inline-block;
        background-color: #9d43ac;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s,
            opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }

    #button_top:hover {
        cursor: pointer;
        background-color: #333;
    }

    #button_top:active {
        background-color: #555;
    }

    #button_top.show {
        opacity: 1;
        visibility: visible;
    }

    .socialbtns,
    .socialbtns ul,
    .socialbtns li {
        margin: 0;
        padding: 5px;
    }

    .socialbtns li {
        list-style: none outside none;
        display: inline-block;
    }

    .socialbtns li a {
        text-decoration: none;
        font-size: 20px;
        margin: 0px 6px;
    }

    .form-control:focus {
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 0 rgb(255 255 255 / 25%);
    }

</style>
</head>

<body>

    @if (!empty($categories))
        @include('layouts.header_sidebar')
    @else
        @include('layouts.header_nosidebar')
    @endif
    <div style="clear: both"></div>
    <div>
        <footer class="footer-section">
            <div class="container">
                <div class="footer-cta">
                    <div class="row">
                        <div class="col-xl-4 col-md-4 mb-30 my-3">
                            <div class="single-cta">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="cta-text">
                                    <a href="https://www.google.com/maps?q=Belgrade,+Serbia" target="_blank"
                                        class="text-decoration-none">
                                        <h4>Find us</h4>
                                    </a>
                                    <span>At this website</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 mb-30 my-3">
                            <div class="single-cta">
                                <i class="fas fa-phone"></i>
                                <div class="cta-text">
                                    <a href="tel:090078601" class="text-decoration-none">
                                        <h4>Call us</h4>
                                    </a>
                                    <span>Not available</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 mb-30 my-3">
                            <div class="single-cta">
                                <i class="far fa-envelope-open"></i>
                                <div class="cta-text">
                                    <a href="mailto: abc@example.com" class="text-decoration-none">
                                        <h4>Mail us</h4>
                                    </a>
                                    <span> email@svarogproject.com </span>
                                </div>
                            </div>
                            <div class="socialbtns pt-4">
                                <ul>
                                    <li><a href="#" class="fab fa-facebook-f  text-white"></a></li>
                                    <li><a href="#" class="fab fa-twitter text-white"></a></li>
                                    <li><a href="#" class="fab fa-linkedin text-white"></a></li>
                                    <li><a href="https://www.instagram.com/svarogproject/" target="_blank"
                                            class="fab fa-instagram text-white"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2022 SvarogProject, all Rights Reserved </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ url('') }}">Home</a></li>
                                    <li><a href="{{ url('marketplace') }}">Marketplace</a></li>
                                    @if (Auth::check())
                                        <li><a href="{{ url('quiz_attempts') }}">Quizzes</a></li>
                                    @endif
                                    <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ url('terms') }}">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @yield('styles')



    <div class="modal fade bs-modal-lg" id="data_modal" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg all-modals">
            <div class="modal-content"></div>
        </div>
    </div>
    <div id="site_url" style="display: none;">{{ url('/') }}</div>
    <div id="current_url" style="display: none;">{{ URL::current() }}</div>
    {{-- <script src="{{ asset('ample/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap Core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('ample/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>



    {{-- <script src="{{ asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <!--slimscroll JavaScript -->
    {{-- <script src="{{ asset('ample/js/jquery.slimscroll.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('ample/js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('ample/js/custom.min.js') }}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    {{-- <script src="{{ asset('js/plugins.js') }}"></script> --}}

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('ample/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('ample/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('ample/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <!-- sparkline chart JavaScript -->
    <script src="{{ asset('ample/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- </script> --}}
    <script src="{{ asset('assets/js/quiz.js') }}"></script>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    {{-- <script src="{{asset('ample/js/footable-init.js')}}"></script> --}}
    <!--Style Switcher -->
    {{-- <script src="{{asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script> --}}
    <script src="{{ asset('js/global-script.js') }}"></script>
    <script src="{{ asset('assets_sidebar/js/scripts.js') }}"></script>


    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.datatable-custom').length > 0) {
                $('.datatable-custom').DataTable();

            }

            var btn = $('#button_top');

            $(window).scroll(function() {
                if ($(window).scrollTop() > 300) {
                    btn.addClass('show');
                } else {
                    btn.removeClass('show');
                }
            });

            btn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, '300');
            });

        });

        $(document).on("click", ".list .delete", function(event) {
            var remvove = $(this).attr("data-remove");
            var attr = $(this).attr("data-action");
            //confirm("Do you want to delete");
            //addWaitWithoutText(this);



            $.ajax({
                type: "GET",
                cache: false,
                url: $(this).attr("data-url"),
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function(res) {
                    if (res.flag == true) {
                        toastr["success"](res.msg, "Completed!");
                        if (res.action == "reload") {
                            window.location.reload();
                        } else {
                            $("." + remvove).remove();
                        }
                    }
                },
            });
        });
    </script>




</body>

</html>
