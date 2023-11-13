{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>

                @if (Auth::user()->role == 0 || Auth::user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                @endif

                @if (Auth::user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.teachers') }}">Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.students') }}">Students</a>
                    </li>
                @endif


                @if (Auth::user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.details') }}">add/view teacher details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('attendance') }}">Mark attendance</a>
                    </li>
                @endif

                @if (Auth::user()->role == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.student.details') }}">add/view student details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myAttendance') }}">My attendance status</a>
                    </li>
                @endif


               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendanceList') }}">attendnace list</a>
                </li>



            </ul>

            <div>
                <p class="d-inline">
                    @if (Auth::user()->role == 0)
                        Principal
                    @elseif(Auth::user()->role == 1)
                        Teacher
                    @elseif(Auth::user()->role == 2)
                        Student
                    @endif
                </p>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-danger " type="submit">LOG OUT</button>
                </form>
            </div>
        </div>
    </div>
</nav> --}}






  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Attendance App</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

     

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 capitalize">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header text-start">
              <h6>{{Auth::user()->name}}</h6>
              <span>@if (Auth::user()->role == 0)
                  Principle
                  @elseif(Auth::user()->role == 1)
                  Teacher
                  @else
                  Student
              @endif
               </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            @if (Auth::user()->role == 2)
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('view.student.details') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->role == 1)
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('view.details') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            @endif
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


          </ul><!-- End Profile Dropdown Items -->
         
        </li><!-- End Profile Nav -->
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button class="btn btn-danger " type="submit">LOG OUT</button>
      </form>
      </ul>
     
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->