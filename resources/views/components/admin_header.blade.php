<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part" style="background: #000">
            <!-- Logo -->
            <a class="logo" style="padding-left: 0px;" href="{{ url('admin') }}">
                <img src="{{ asset('assets/images/new_logo.png') }}" style="width: 240px;height: 60px">
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a>
            </li>

        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <b
                        class="hidden-xs">{{\Auth::user()->name}}</b><span class="caret"></span> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-text">
                                <h4>{{\Auth::user()->name}}</h4>
                                <p class="text-muted">{{Auth::user()->email}}</p><a
                                    href="{{ url('admin/profile_page') }}"
                                    class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>

                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fa fa-power-off"></i> {{ __('Logout') }}</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->