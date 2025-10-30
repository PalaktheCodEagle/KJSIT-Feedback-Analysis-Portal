  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php
      if (!isset($_SESSION['adminid'])) {
	echo "<script>window.location='../../index.php';</script>";
  }
    if ($sidemenu == "admin") {
    ?>
      <a href="admindashboard.php" class="brand-link">
          <?php
    }
      ?>
          <img src="FAVICON1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>Feedback Portal</b></span>
      </a>

      <style>
       .os-content{
           background-color: #001c30;
       }
       .brand-link
       {
            background-color: #001c30;
       }
       .brand-text{
           color:white;
           font-weight:bolder;
       }
       [class*="sidebar-dark-"] .sidebar a{
           color: white;
       }
       p{
           color:white;
       }
       [class*="sidebar-dark-"] {
    background-color: #001c30;
}
   </style>
    
      <!-- Sidebar -->
      <div class="sidebar" style="color:#9B2928">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               <br /> with font-awesome or any other icon font library -->

                  <li class="nav-item has-treeview">
                      <a href="admindashboard.php" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>


                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>Feedback
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="feedbacktopicadmin.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>New Feedback Topic</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="viewfeedbacktopicadmin.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Feedbacks Topics</p>
                              </a>
                          </li>
                      </ul>
                  </li>




                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-user-circle"></i>
                          <p>
                              Student
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <!-- <li class="nav-item">
                <a href="student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add  Student</p>
                </a>
              </li> -->
                          <li class="nav-item">
                              <a href="viewstudent.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Student</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <!-- <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Parent
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Parent</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Parent</p>
                              </a>
                          </li>
                      </ul>
                  </li> -->


                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-graduation-cap"></i>
                          <p>
                              Faculty
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="faculty.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Faculty</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="viewfaculty.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Faculty</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <!-- <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Alumni
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Alumni</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Alumni</p>
                              </a>
                          </li>
                      </ul>
                  </li> -->

                  <!-- <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Employer
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Employer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Employer</p>
                              </a>
                          </li>
                      </ul>
                  </li>
 -->


                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Course
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="course.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Course</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="viewcourse.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Course</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-lock"></i>
                          <p>
                              Admin
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="admin.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Admin</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="viewadmin.php" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Admin</p>
                              </a>
                          </li>
                      </ul>
                  </li>



                  <li class="nav-item has-treeview">
                      <a href="view.php" class="nav-link" target="_blank">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Submission Status
                              <!--<i class="fas fa-angle-left right"></i>-->
                          </p>
                      </a>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="viewanalysisreport.php" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Analysis Report
                              <!--<i class="fas fa-angle-left right"></i>-->
                          </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>