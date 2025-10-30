<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KJSIT's Stakeholders Feedback Analysis Portal</title>
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

    <style>
        .bg {
            background-image: linear-gradient(#9b2a2841, #00000000), url('greybg.jpg');
        }

        .card-deck .card {
            margin-left: 45px;
            margin-right: 20px;
            padding: 10px;
        }

        .card-title {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;

        }

        .card {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border: 2px solid #9b2928;
            border-radius: 10px;
            box-shadow: 5px 5px 8px gray;
        }

        .card .card-title {
            font-size: x-large;
            font-weight: bold;
            color: #9b2928;
        }

        nav {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
            align-items: center;
        }

        #logo {
            height: 6rem;
            width: 100%;
        }

        .row {
            display: flex;
            flex-direction: row;
            margin-right: 5px;
        }

        .row a {
            color: black;
            text-decoration: none;
            margin: 0.3rem;
        }

        .row a:hover {
            color: #b7202e;
        }

        #trust {
            height: 50px;
            width: 100px;
        }

        button {
            border: 0.3px solid #000000;
            background-color: transparent;


        }

        .heading {

            text-align: center;
            font-weight: bolder;
            background-color: #9b2928;
            color: white;
        }

        .login-box {

            border-radius: 15px;
        }

        footer {
            background: #9B2928;
            height: auto;
            width: 100vw;
            font-family: 'Poppins', sans-serif;
            padding-top: 20px;
            color: white;
            padding-bottom: 10px;

        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .footer-content h6 {

            line-height: 1.5rem;
            font-weight: bold;
            font-size: 17px;
        }

        .footer-content p {

            margin: 10px auto;
            line-height: 30px;

        }

        .footer-content year {
            font-size: 17px;
        }

        @media (max-width:640px) {
            #trust {
                width: 50px;
                height: 25px;
            }

            .card {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .card-img-top {
                height: 80px !important;
                width: 100px !important;
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                /*padding-left:20px!important;*/
                /*display:none;*/
            }
        }

        @media (max-width:789px) {
            #trust {
                width: 50px;
                height: 25px;
            }
        }

        @media (min-width: 768px) {
            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: fit-content;

            }

        }

        @media (max-width:480px) {
            .icons {
                display: none;
            }

            .card-img-top {
                height: 80px;
                width: 90px;
            }

            #logo {
                height: 3rem;
                width: 100%;
            }

            .row {
                display: none;
            }

            #trust {
                width: 50px;
                height: 25px;
            }

            @media (max-width: 850px) {
                .icons {
                    display: none;
                }

                .row {

                    display: block;
                }

                #trust {
                    width: 50px;
                    height: 25px;
                }


            }
        }
    </style>
    <!-- nav bar code start-->
    <div class="nav">
        <nav>
            <div class="img">

                <img id="logo" src="images/Somaiya1.png" alt="">

            </div>
            <div class="row">

                <div class="icons">
                    <button type="button" name="button"> <a href="https://www.somaiya.edu.in/en" target="_blank" style="color: black, !important;">
                            <i class="bi bi-globe"></i> somaiya.edu
                        </a></button>
                    <a href="https://www.facebook.com/kjsieitofficial" target="_blank">
                        <i class="bi bi-facebook style='#000000'"></i>
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
                    <a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQGGuSH8KhlwSwAAAYLQ0-lI197THvyK68qNQUCy_45bItZlyVxB3zJIOqkcWsZbXs1Fbm5WsDzldL7D_aRcaijw5KvMXS4IdirAPV3v2BqILFUp5pcJxb0qpO5rUYdLIvVI5aE=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fkjsieit" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <img id="trust" src="images/Trust.png" alt="">
                </div>
            </div>
        </nav>
    </div>
    <!-- nav bar code end-->
    <br>
    <div class="heading">
        <h1 style="font-weight: bolder;">KJSIT's Stakeholders Feedback Analysis Portal</h1>
    </div>


    <div class="bg">
        <br>
        <div class="card-deck">

            <!-- Card 1 -->

            <div class="card">
                <br>
                <h5 class="card-title">Alumni Login</h5>
                <br>
                <form action="alumnilogin.php" method="post">
                    <img class="card-img-top" src="images/Alumni.png" alt="Card image cap" style="height:125px; width:130px">
                    <div class="card-body">
                        <div class="social-auth-links text-center mb-3">
                            <input type="submit" class="btn btn-block btn-primary" value="Login" name="btnlink">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Card 2 -->

            <!-- <div class="card">
    <br>
  <h5 class="card-title">Parent Login</h5>
  <br>
    <form action="parentlogin.php" method="post"> 
    <img class="card-img-top" src="images/parent.png" alt="Card image cap" style="height:125px; width:140px">
    <div class="card-body">
     <div class="social-auth-links text-center mb-3">
		<input type="submit" class="btn btn-block btn-primary"
		value=" Login " name="btnlink">
	</div>
    </div>
      </form>
  </div> -->

            <!-- Card 3 -->

            <!-- <div class="card">
  <br>
  <h5 class="card-title">Faculty Login</h5>
  <br>
      <form action="#" method="post"> 
    <img class="card-img-top" src="images/Faculty.png" alt="Card image cap" style="height:125px; width:130px">
    <div class="card-body">
     <div class="social-auth-links text-center mb-3">
		<input type="submit" class="btn btn-block btn-primary"
		value=" Login " name="btnlink">
	</div>
    </div>
      </form>
  </div>
</div>
<br>
  <div class="card-deck"> -->

            <!-- Card 4 -->

            <!-- <div class="card">
    <br>
  <h5 class="card-title">Alumni Login</h5>
  <br>
      <form action="#" method="post"> 
    <img class="card-img-top" src="images/Alumni.png" alt="Card image cap" style="height:125px; width:130px">
    <div class="card-body">
      <div class="social-auth-links text-center mb-3">
		<input type="submit" class="btn btn-block btn-primary"
		value=" Login " name="btnlink">
	</div>
    </div>
      </form>
  </div> -->

            <!-- Card 5 -->

            <!-- <div class="card">
    <br>
  <h5 class="card-title">Employer Login</h5>
  <br>
      <form action="#" method="post"> 
    <img class="card-img-top" src="images/employer.png" alt="Card image cap" style="height:125px; width:135px">
    <div class="card-body">
     <div class="social-auth-links text-center mb-3">
		<input type="submit" class="btn btn-block btn-primary"
		value=" Login " name="btnlink">
	</div>
    </div>
      </form>
  </div> -->



            <!-- Card 6 -->

            <div class="card">
                <br>
                <h5 class="card-title">Admin Login</h5>
                <br>
                <form action="adminlogin.php" method="post">
                    <img class="card-img-top" src="images/admin.png" alt="Card image cap" style="height:125px; width:130px">
                    <div class="card-body">
                        <div class="social-auth-links text-center mb-3">
                            <input type="submit" class="btn btn-block btn-primary" value=" Login " name="btnlink">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <footer>
        <div class="footer-content">
            <h6>Department Of Computer Engineering</h6>
            <h6 class="year"><i class="bi bi-c-circle"></i> 2022-23</h6>
            <a href="aboutus.php" style="color:white !important">
                <h6>Guided by : Prof. Jyoti Wadmare</h6>
                <h6>Developed by : Dakshita Kolte, Kapil Bhatia, Palak Desai, Kartikeya Dangat</h6>
            </a>
        </div>
    </footer>
</body>

</html>