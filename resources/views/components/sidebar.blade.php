<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="{{ route('admin') }}"> <i class="fas fa-tachometer-alt"></i>Dashboard </a>
                       
                    </li>
                    <li class="nav-item ">
                        
                       
                    </li>
                    
                   {{--  <li class="nav-item ">
                        <a class="nav-link" href="{{ route('category_list') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>Categroy </a>
                       
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-certificate"></i>Courses</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                     <a class="nav-link" href="{{ route('courses_list') }}" ><i class="fas fa-fw fa-certificate"></i>All Courses</a>
                                </li>
                                <li class="nav-item">
                                     <a class="nav-link" href="{{ route('syllabus_list') }}" ><i class="fas fa-fw fa-book"></i>Syllabus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('topics_list') }}" ><i class="fal fa-fw fa-book-open"></i>Topics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('lesson_list') }}" ><i class="fas fa-fw fa-chalkboard-teacher"></i></i>Lesson</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-table"></i>Quiz</a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('quizzes_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Quiz</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('questions_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Questions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('answers_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Answers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('quiz_attempts_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Quiz Attempts</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-table"></i>Organization</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('organizations_list') }}" ><i class="fas fa-fw fa-question-circle"></i>All Organization</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{ route('schools_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Schools</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('disciplines_list') }}" ><i class="fas fa-fw fa-question-circle"></i>Discipline</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('course_suggestions_list') }}">Course Suggestions </a>
                       
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('syllabus_list') }}" ><i class="fas fa-fw fa-table"></i>Syllabus</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics_list') }}" ><i class="fas fa-fw fa-table"></i>Topics</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lesson_list') }}" ><i class="fas fa-fw fa-table"></i>Lesson</a>
                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('questions_list') }}" ><i class="fas fa-fw fa-table"></i>Questions</a>
                        
                    </li> --}}

                    
                </ul>
            </div>
        </nav>
    </div>
</div>