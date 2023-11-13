    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? '' : 'collapsed' }}" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            {{-- for teacher and principal --}}
            @if (Auth::user()->role == 0 || Auth::user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.register') ? '' : 'collapsed' }}"
                        href="{{ route('user.register') }}"><i class="bx bxs-user-plus"></i><span>Register</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('view.students') ? '' : 'collapsed' }}"
                        href="{{ route('view.students') }}"><i class="ri-group-fill"></i>Students</a>
                </li>
            @endif

            {{-- only for principle --}}
            @if (Auth::user()->role == 0)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('view.teachers') ? '' : 'collapsed' }}"
                        href="{{ route('view.teachers') }}"><i class="bi bi-award-fill"></i>Teachers</a>
                </li>
            @endif

            {{-- only for teacher --}}
            @if (Auth::user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('attendance') ? '' : 'collapsed' }}"
                        href="{{ route('attendance') }}"><i class="bx bxs-check-circle"></i>Mark attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('attendanceList') ? '' : 'collapsed'}}" href="{{ route('attendanceList') }}"><i class="bx bxs-spreadsheet"></i>Attendnace list</a>
                </li>
            @endif

                {{-- for students only --}}
            @if (Auth::user()->role == 2)
               
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('myAttendance') ? '' : 'collapsed'}}" href="{{ route('myAttendance') }}"><i class="bx bxs-calendar-star"></i>My attendance status</a>
                </li>
            @endif

        </ul>

    </aside><!-- End Sidebar-->
