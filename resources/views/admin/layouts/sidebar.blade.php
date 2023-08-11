  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
@if(Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{route('departments.index')}}">
          <i class="bi bi-menu-button-wide"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('departments.index')}}">
              <i class="bi bi-circle"></i><span>Departments list</span>
            </a>
          </li>
          
          <li>
            <a href="{{route('departments.create')}}">
              <i class="bi bi-circle"></i><span>Add new</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="{{route('users.index')}}">
          <i class="bi bi-journal-text"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('users.index')}}">
              <i class="bi bi-circle"></i><span>Employees list</span>
            </a>
          </li>
          <li>
            <a href="{{route('users.create')}}">
              <i class="bi bi-circle"></i><span>Add employee/user</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="{{route('salaries.index')}}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Salary</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('salaries.index')}}">
              <i class="bi bi-circle"></i><span>Salary list</span>
            </a>
          </li>
          <li>
            <a href="{{route('salaries.create')}}">
              <i class="bi bi-circle"></i><span>Add new </span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
@endif

@if(Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="{{route('attendance.index')}}">
          <i class="bi bi-bar-chart"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('attendance.index')}}">
              <i class="bi bi-circle"></i><span>Attendance</span>
            </a>
          </li>
          {{-- @if(Auth::user()->role == 'admin') --}}
          <li>
            <a href="{{route('attendance.create')}}">
              <i class="bi bi-circle"></i><span>Mark attendance</span>
            </a>
          </li>
          {{-- @endif --}}
          <li>
            <a href="{{route('time-entries.store')}}">
              <i class="bi bi-circle"></i><span>Mark attendance</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="{{route('leaves.index')}}">
          <i class="bi bi-gem"></i><span>Leaves</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('leaves.index')}}">
              <i class="bi bi-circle"></i><span>Leaves list</span>
            </a>
          </li>
          <li>
            <a href="{{route('leaves.create')}}">
              <i class="bi bi-circle"></i><span>Apply for leave</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Icons Nav -->
@endif

@if(Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="{{route('leaves.index')}}">
          <i class="bi bi-gem"></i><span>Notices</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('notices.index')}}">
              <i class="bi bi-circle"></i><span>Notices list</span>
            </a>
          </li>
          <li>
            <a href="{{route('notices.create')}}">
              <i class="bi bi-circle"></i><span>Add Notice</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Icons Nav -->
@endif

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profile.index')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside><!-- End Sidebar-->
