<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kjsit's Stakeholders Feedback Analysis Portal</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

</head>

<body>

    <!-- <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">SAMPLE NAVBAR</span>
        </div>
      </nav> -->
    <div class="nav">
        <nav>
            <div class="img">

                <img id="logo" src="Somaiya1.png" alt="Somaiya Logo.png">

            </div>
            <div class="row">

                <div class="icons">
                    <button type="button" name="button"> <a href="https://www.somaiya.edu.in/en" target="_blank">
                            <i class="bi bi-globe"></i> somaiya.edu
                        </a></button>
                    <a href="https://www.facebook.com/kjsieitofficial" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/kjsieit1" target="_blank">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/kjsieit_22/" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/kjsieitofficial" target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQGGuSH8KhlwSwAAAYLQ0-lI197THvyK68qNQUCy_45bItZlyVxB3zJIOqkcWsZbXs1Fbm5WsDzldL7D_aRcaijw5KvMXS4IdirAPV3v2BqILFUp5pcJxb0qpO5rUYdLIvVI5aE=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fkjsieit"
                        target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <img id="trust" src="Trust.png" alt="Trust.png">
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Home</a>
        <!-- <a href="#news">News</a>
        <a href="#contact">Contact</a> -->
        <a href="aboutus.php">About Us</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

    <div class="divide"></div>
    <div class="heading"><b>KJSIT'S STAKEHOLDERS FEEDBACK ANALYSIS PORTAL</b></div>
    <div class="divide1"></div>

    <div class="traineeship">
        <div class="process-row">
            <div class="activity animate-from-bottom__0">
                <div class="relative-block">
                    <div class="activity-icon">
                        <img class="logo" alt="An image" src="images/Student.png">
                    </div>
                    <div class="inactive">
                        <div class="title">Student</div>
                    </div>
                    <div class="active">
                        <div class="title">Student</div>
                        <a class="btn btn-primary" href="feedbackstudent/feedback/studentlogin.php"
                            role="button">Student
                            Login</a>
                        <a class="btn btn-primary" href="feedbackstudent/feedback/adminlogin.php" role="button">Admin
                            Login</a>

                    </div>
                </div>
            </div>
            <div class="activity animate-from-bottom__1">
                <div class="relative-block">
                    <div class="activity-icon">
                        <img class="logo" alt="An image" src="images/Faculty.png"
                            alt="ad-operations-process-strategy-activation">
                    </div>
                    <div class="inactive">
                        <div class="title">Faculty</div>
                    </div>
                    <div class="active">
                        <div class="title">Faculty</div>

                        <a class="btn btn-primary" href="feedbackfaculty/feedback/facultylogin.php"
                            role="button">Faculty Login</a>
                        <a class="btn btn-primary" href="feedbackfaculty/feedback/adminlogin.php" role="button">Admin
                            Login</a>

                    </div>
                </div>
            </div>
            <div class="activity animate-from-bottom__2">
                <div class="relative-block">
                    <div class="activity-icon">
                        <img class="logo" alt="An image" src="images/Parent.png">
                    </div>
                    <div class="inactive">
                        <div class="title">Parent</div>
                    </div>
                    <div class="active">
                        <div class="title">Parent</div>

                        <a class="btn btn-primary" href="feedbackparent/feedback/parentlogin.php" role="button">Parent
                            Login</a>
                        <a class="btn btn-primary" href="feedbackparent/feedback/adminlogin.php" role="button">Admin
                            Login</a>

                    </div>
                </div>
            </div>
            <div class="activity animate-from-bottom__3">
                <div class="relative-block">
                    <div class="activity-icon">
                        <img class="logo" alt="An image" src="images/Alumni.png"
                            alt="ad-operations-process-strategy-activation">
                    </div>
                    <div class="inactive">
                        <div class="title">Alumni</div>
                    </div>
                    <div class="active">
                        <div class="title">Alumni</div>

                        <a class="btn btn-primary" href="feedbackAlumni/feedback/alumnilogin.php" role="button">Alumni
                            Login</a>
                        <a class="btn btn-primary" href="feedbackAlumni/feedback/adminlogin.php" role="button">Admin
                            Login</a>

                    </div>
                </div>
            </div>
            <div class="activity animate-from-bottom__4">
                <div class="relative-block">
                    <div class="activity-icon">
                        <img class="logo" alt="An image" src="images/Employer.png">
                    </div>
                    <div class="inactive">
                        <div class="title">Employer</div>
                    </div>
                    <div class="active">
                        <div class="title">Employer</div>

                        <a class="btn btn-primary" href="feedbackemployee/feedback/employeelogin.php"
                            role="button">Employer Login</a>
                        <a class="btn btn-primary" href="feedbackemployee/feedback/adminlogin.php" role="button">Admin
                            Login</a>

                    </div>
                </div>
            </div>

            <div class="activity animate-from-bottom__4">
                <div class="relative-block">
                    <div class="activity-icon">

                        <img class="logo" alt="An image" src="images/Academic Peers.png">

                    </div>
                    <div class="inactive">
                        <div class="title">Academic <br> Peers</div>
                    </div>
                    <div class="active">
                        <div class="title">Academic Peers</div>

                        <a class="btn btn-primary" href="feedbackacademicpeers/feedback/peerslogin.php"
                            role="button">Academic Peers
                            Login</a>
                        <a class="btn btn-primary" href="feedbackacademicpeers/feedback/adminlogin.php"
                            role="button">Admin Login</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="footer-content">

            <h6><b>Department Of Computer Engineering</b></h6>
            <h6><i class="bi bi-c-circle"></i><b>2022-23</b> </h6>
            <h6><b>Guided by : Prof. Jyoti Wadmare</b></h6>
            <h6><b>Developed by : Dakshita Kolte, Kapil Bhatia and Palak Desai</b></h6>
        </div>
    </footer>

</body>

</html>