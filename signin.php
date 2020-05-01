<?php
    session_start();
    error_reporting(0);
    include("config.php"); 

    $Err = "";
        $Invalid = "";
    if(isset($_POST['submit']))
    {
        
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $password = $_POST['password'];
        $conpassword = $_POST['confirm-password'];
        if($password != $conpassword){
            $Err = "Your Confirm Password does'n match Password.";
        }
        else {

            $sql1 = "SELECT * FROM login WHERE email = '$username'";

            $result = $con->query($sql1);

            if ($result->num_rows > 0) {
                // output data of each row
                    
                        $Invalid = "Email Id alread Exist.!!";
            }else {
                        $sql = "INSERT INTO login (user_name,email,password,fullname) VALUES ('$username','$email','$password','$fullname')";
                        if(mysqli_query($con, $sql))
                        {
                            $Invalid = "Registration Successful. Please Sign in ..";
                            header("Location:signin.php");
                        }else{
                            $Invalid = "Error " . $con->error;
                        }
                    }

            
            $con->close();
        }
    }

    if (isset($_POST['signin'])) {
        $username = $_POST['user_name'];
        $password = $_POST['user_password'];

        $sql1 = "SELECT * FROM login WHERE email = '$username' and password = '$password' ";
        $result = $con->query($sql1);
        if ($result->num_rows > 0) {
            //$_SESSION['email'] = $username;
            //$_SESSION['password'] = $password;
            header("Location:index.php");
        }else {
            $Invalid = "Login Credentials does'n match .";
        }
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodeiblog | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body class="fixed-position">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Sign In Section Begin -->
    <div class="signin">
        <div class="signin__warp">
            <div class="signin__content">
                <div class="signin__logo">
                    <a><img src="img/WeGan.png" alt=""></a>
                </div>
                <p>Hi, i am Nitya,nitya nitya nityaaaa... nitya, nitya,,.</p>
                <div class="signin__form">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">
                                Sign up
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">
                                Sign in
                            </a>
                        </li>
                        <li class="nav-item">
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="signin__form__text">
                               
                                <div class="divide">or</div>
                                <form method="POST">
                                    <span style="color: #FF0000"><?php echo $Invalid; ?></span>
                                    <input type="text" placeholder="User Name*" name="username" required>

                                    <input type="text" placeholder="Full name" name="fullname" required>
                                   <input type="text" placeholder="Email Id" name="emailid" required>
                                    <input type="text" placeholder="Password" name="password" required>
                                    <span style="color: #FF0000"><?php echo $Err; ?></span>
                                    <input type="text" placeholder="confirm Password" name="confirm-password" required>
                                   
                                    <button type="submit" class="site-btn" name="submit">Register Now</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="signin__form__text">
                                
                                <div class="divide">or</div>
                                <form method="POST">
                                    <input type="text" placeholder="User Name*" name="user_name" required>
                                    <input type="text" placeholder="Password" name="user_password" required>
                                    <button type="submit" class="site-btn" name="signin">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Section End -->





    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>