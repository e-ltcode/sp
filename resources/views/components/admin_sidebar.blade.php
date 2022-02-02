<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                    class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">

            {{-- <ul class="nav nav-second-level"> --}}
                <li> <a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-av-timer fa-fw"></i> <span
                            class="hide-menu"> Dashboard </span> </span></a>
                </li>
                {{-- <span class="label label-rouded label-inverse pull-right">4</span> --}}
                @if (auth()->user()->role == '-1')
                <li>
                    <a href="{{ url('/admin/users') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Users</span></a>
                </li>
                @endif
                {{-- <li>
                    <a href="{{ route('tags') }}"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Course
                            Tags</span></a>
                </li> --}}
                {{-- <li>
                    <a href="{{ url('admin/courses') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Courses</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/syllabus') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Syllabus</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/topics') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Course Topics</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/lesson') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Course Lessons</span></a>
                </li> --}}

                {{-- <li>
                    <a href="{{ url('admin/offers') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Offer</span></a>
                </li> --}}
                <li>
                    <a href="{{ url('admin/quizes') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Quizes</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/category') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Categories</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/orders') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Orders</span></a>
                </li>

                <li>
                    <a href="{{ url('admin/order_items') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Order Items</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/questions') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Questions</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/answers') }}"><i class="mdi mdi-av-timer fa-fw"></i><span
                            class="hide-menu">Answers</span></a>
                </li>
                {{--
            </ul>
            </li> --}}
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->