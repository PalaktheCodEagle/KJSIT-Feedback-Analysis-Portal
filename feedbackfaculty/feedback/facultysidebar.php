  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="facultydashboard.php" class="brand-link">
          <img src="FAVICON1.png" alt="Income expense tracker" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light"><b>Feedback System</b></span>
      </a>
      <style>
      .os-content {
          background-color: #001c30;
      }

      .brand-link {
          background-color: #001c30;
      }

      .brand-text {
          color: white;
          font-weight: bolder;
      }

      [class*="sidebar-dark-"] .sidebar a {
          color: white;
      }

      p {
          color: white;
      }
      [class*="sidebar-dark-"] {
    background-color: #001c30;
}
      </style>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <?php
        /*
        <div class="image">
          <img src="<?php 
		  if($rsfaculty['profileimg'] == "")
		  {
			  echo "images/defaultimg.png";
		  }
		  else if(!file_exists($rsfaculty['profileimg']))
		  {
			  echo "images/defaultimg.png";
		  }
		  else
		  {
		  echo $rsfaculty['profileimg']; 
		  }
		  ?>" class="img-circle elevation-2" alt="<?php echo $rsfaculty['facultyname']; ?>">
          </div>
          */
          ?>
          <div class="info">
              <b><a href="facultyprofile.php" class="d-block">Welcome <?php echo $rsfaculty['facultyname']; ?></a></b>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               <br /> with font-awesome or any other icon font library -->

              <li class="nav-item has-treeview">
                  <a href="facultydashboard.php" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Faculty Dashboard
                      </p>
                  </a>
              </li>

              <li class="nav-item has-treeview">
                  <a href="participatefeedback.php?qtype=All" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Post Feedback
                      </p>
                  </a>
              </li>


              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>
                          Faculty Account
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="facultyprofile.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>My Profile</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="facultychangepassword.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Change Password</p>
                          </a>
                      </li>
                  </ul>
              </li>


          </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->

  </aside>