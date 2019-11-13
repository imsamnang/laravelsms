
<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">                
      <li class="active">
        <a class="" href="/">
          <i class="icon_house_alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_document_alt"></i>
          <span>Courses</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="{{route('manageCourse')}}">Manage Course</a></li>
        </ul>
      </li>      

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_desktop"></i>
          <span>Student</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="{{route('getStudentRegister')}}">Create Student</a></li>
          <li><a class="" href="{{route('showAllStudent')}}">Student List</a></li>
          <li><a class="" href="grids.html">Grids</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_table"></i>
          <span>Fees</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="{{route('getPayment')}}">Student Payment</a></li>
          <li><a class="" href="{{route('getFeeReport')}}">Fee Report</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_table"></i>
          <span>Report</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="{{ route('getStudentList') }}">Student Report</a></li>
          <li><a class="" href="{{ route('getStudentListMultiClass') }}">Muti Class Student Report</a></li>
          <li><a class="" href="{{ route('getNewStudentRegister') }}">New Student Enroll</a></li>
        </ul>
      </li>

      <li>
        <a class="" href="widgets.html">
          <i class="icon_genius"></i>
          <span>Widgets</span>
        </a>
      </li>

      <li>                     
        <a class="" href="chart-chartjs.html">
          <i class="icon_piechart"></i>
          <span>Charts</span>

        </a>

      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_table"></i>
          <span>Tables</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="basic_table.html">Basic Table</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_documents_alt"></i>
          <span>Pages</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">                          
          <li><a class="" href="profile.html">Profile</a></li>
          <li><a class="" href="login.html"><span>Login Page</span></a></li>
          <li><a class="" href="blank.html">Blank Page</a></li>
          <li><a class="" href="404.html">404 Error</a></li>
        </ul>
      </li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
      <!--sidebar end-->