 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  
@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{($prefix == '/users')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users')}}" class="nav-link {{($route == 'users')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

            </ul>
          </li>

      

          
          <li class="nav-item {{($prefix == '/Admin')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Manage Setup
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('classes.index')}}" class="nav-link {{($route == 'classes.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('shifts.index')}}" class="nav-link {{($route == 'shifts.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shifts</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('groups.index')}}" class="nav-link {{($route == 'groups.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groups</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('years.index')}}" class="nav-link {{($route == 'years.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Year</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('fee_categories.index')}}" class="nav-link {{($route == 'fee_categories.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('fee_amounts.index')}}" class="nav-link {{($route == 'fee_amounts.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Amount List</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{route('examtypes.index')}}" class="nav-link {{($route == 'examtypes.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Type</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('subjects.index')}}" class="nav-link {{($route == 'subjects.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="{{route('assign.index')}}" class="nav-link {{($route == 'assign.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asgin Subject</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('designations.index')}}" class="nav-link {{($route == 'sdesignations.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix == '/student')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-graduate"></i>
              <p>
                Manage Student
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.all')}}" class="nav-link {{($route == 'student.all')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('student.roll.gen')}}" class="nav-link {{($route == 'student.roll.gen')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Roll Generate</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('student.reg.fee')}}" class="nav-link {{($route == 'student.reg.fee')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Fee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('student.monthly.fee.view')}}" class="nav-link {{($route == 'student.monthly.fee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Fee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('student.exam.fee.view')}}" class="nav-link {{($route == 'student.exam.fee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Fee</p>
                </a>
              </li>
         
              <!-- sfksdf -->


               

            </ul>
          </li>


          <li class="nav-item has-treeview {{($prefix == '/employee')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-diagnoses"></i>
              <p>
                Manage Employee
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('emaployee.all')}}" class="nav-link {{($route == 'emaployee.all')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empolyee Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('emaployee.salary')}}" class="nav-link {{($route == 'emaployee.salary')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empolyee Salary</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('emaployee.leave')}}" class="nav-link {{($route == 'emaployee.leave')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empolyee Leave</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('emaployee.attendnace')}}" class="nav-link {{($route == 'emaployee.attendnace')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empolyee Attendance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('attendnace.month')}}" class="nav-link {{($route == 'attendnace.month')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Attendance</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{route('montly.salary')}}" class="nav-link {{($route == 'montly.salary')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Salary</p>
                </a>
              </li>
             

            </ul>
            </li>
          </li>

         <li class="nav-item {{($prefix == '/marks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Marks Management
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('get.marks')}}" class="nav-link {{($route == 'get.marks')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('edit.marks')}}" class="nav-link {{($route == 'edit.marks')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Edit</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('marks.grade')}}" class="nav-link {{($route == 'marks.grade')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Grade</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item  {{($prefix == '/accounts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Accounts Management
                 <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.fee.view')}}" class="nav-link {{($route == 'student.fee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Fee</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('employee.salary.view')}}" class="nav-link {{($route == 'employee.salary.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Pay</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('others.cost.view')}}" class="nav-link {{($route == 'others.cost.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others Cost</p>
                </a>
              </li>
           

            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i style="color:red" class="nav-icon fas fa-sign-out-alt"></i>
              <p >
                Logout
              
              </p>
            </a>
          </li>


         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>