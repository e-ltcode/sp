        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                    <ul class="nav" id="side-menu">
                        <li class="user-pro">
                            <a href="#" class="waves-effect"><img src="{{ asset('storage/'.\Auth::user()->image) }}" alt="user-img" class="img-circle"> <span class="hide-menu"> {{ \Auth::user()->name }}<span class="fa arrow"></span></span>
                            </a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                                {{-- <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li> --}}
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                            </ul>
                        </li>
                        {{-- <ul class="nav nav-second-level"> --}}
                            <li> <a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> </span></a>
                            </li>
                            {{-- <span class="label label-rouded label-inverse pull-right">4</span> --}}
                            <li> 
                                <a href="{{ url('instructor/courses') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Courses</span></a> 
                            </li>
                            <li> 
                                <a href="{{ url('instructor/syllabus/') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Syllabus</span></a> 
                            </li>
                            <li> 
                                <a href="{{ url('instructor/topics/') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Course Topics</span></a> 
                            </li>
                            <li> 
                                <a href="{{ url('instructor/lesson/') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Course Lessons</span></a> 
                            </li>

                            <li> 
                                <a href="{{ url('instructor/quizes/') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Course Quizes</span></a> 
                            </li>
                        {{-- </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->