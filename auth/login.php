<?php 
session_start();
include '../config/db.php';
include '../config/config.php';
include '../config/functions.php';

$msg = "";
$err = "";

$email_err = $password_err= ""; 
$email = $password= "";
    
    if (isset($_POST['login_action'])) {
        
         if (empty($_POST["email"])) {
            $err = "Email is required";
          } else {
            $email = text_input($_POST["email"]);
          }
          
          if (empty($_POST["password"])) {
            $err = "Password is required";
          } else {
            $password = text_input($_POST["password"]);
          }

        if($email == "" || $password == ""){
            $err = "Email or Password fields cannot be empty!";
        }else{
            $sql = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
            if(mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_assoc($sql);
                $email = $data['email'];
                $fname = $data['fname'];
                $lname = $data['lname'];
                $id = $data['id'];
                
                if($data['2fa'] == 1){
                    $code = "0123456789";
                    $fa2_code = str_shuffle($code);
                    $fa2_code = substr($fa2_code, 0, 6);
                    $update = mysqli_query($link, "UPDATE users SET 2fa_code = '$fa2_code' WHERE email = '$email' ");
                    if ($update) {
                        $_SESSION['2fa_login'] = $email;
                        $_SESSION['otp'] = 2;
                        $name = $fname." ".$lname;
                        $subject = "Auth OTP";
                        $body = "<h5>Login OTP</h5> <p>Hi ".$fname."</p> <p>A login attempt was made on your account. use the code below to complete sign in.</p> <h5> <strong>".$fa2_code."</strong> </h5> <p>If you have any questions, please contact support on our website or at <a href='mailto:support@coinfigo.com'>support@coinfigo.com</a> </p> <p>Join our Telegram and other media platforms. <br> Get an insight from other users about Coinfigo and their experiences. 300k+ members and counting. <a href='https://t.me/Coinfigotrades'>Join now</a> </p> <p>Thanks,</p> <p>".$sitename."</p> ";
                        $send = sendMail($email, $name, $subject, $body);
                        if ($send) {
                            // echo "<script>window.location.href = '2fa.php' </script>";
                        }
                        echo "<script>window.location.href = '2fa.php' </script>";
                    }
                }else{
                    $_SESSION['user_mail'] = $email;
                    echo "<script>window.location.href = '../user/dashboard.php' </script>";
                }

                
                
            }else{
                $err = "Invalid Email and Password";
            }
        }
    }


 ?>

<!doctype html>
<html lang="en">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Peter Parker">
    <meta name="theme-color" content="#2E89EA" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../logo2.jpg" type="image/png">
    <!-- Touch icon -->
    <link rel="apple-touch-icon-precomposed" href="../logo.png">
    <title>Sign in - COINFIGO</title>

    <script src="../dash/js/jquery-3.2.1.min.js"></script>
    <script src="../dash/notiflix-Notiflix-dfaf93f/dist/notiflix-aio-3.2.5.min.js"></script>
    <link rel="stylesheet" href="user/dash/css/style.css">
    <link rel="stylesheet" href="user/dash/css/user-custom.css">
    <script src="user/dash/notiflix-aio-3.2.5.min.js"></script>
    <script src="user/js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <!-- page loader begin -->
    <!--<div class="page-loader w-100 h-100 bg-white d-flex justify-content-center align-items-center position-fixed overflow-hidden">-->
    <!--    <div class="spinner-grow spinner-grow-sm text-success"></div>-->
    <!--    <div class="spinner-grow spinner-grow-sm text-success"></div>-->
    <!--    <div class="spinner-grow spinner-grow-sm text-success"></div>-->
    <!--</div>-->
    <!-- page loader end -->
    <main>
        <!-- section content begin -->
        <section>
            <div class="container-fluid overflow-hidden">
                <div class="row vh-100">

                    <div class="col-md-12 col-lg-6 d-flex align-items-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="text-center">
                                    <a class="navbar-brand" href="../index.html">
                                        <img src="/logo.png" alt="logo" height="36" class="d-inline-block">
                                    </a>
                                    <p class="lead mt-1 mb-3">Log into your account</p>
                                    <!-- login form begin -->
                                    <?php  
if ($msg != "") {
	echo userAlert("success", $msg);
	echo pageRedirect("3", "login.php");
}

if ($err != "") {
	echo userAlert("error", $err);
}
?>
                                    <form class="mb-2" method="POST" action="login.php">
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="email" name="email" required="" class="form-control" placeholder="Email" aria-label="Email">
                                                    <span class="input-group-text"><i class="fas fa-envelope fa-xs text-muted"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="password" name="password" required="" class="form-control" placeholder="Password" aria-label="Password">
                                                    <span class="input-group-text"><i class="fas fa-lock fa-xs text-muted"></i></span>
                                                </div>
                                            </div>

                                            <br><br><br>

                                            <div class="col-6 text-start">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"><small>Remember me</small></label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <a href="forgot-password.php" class="link-dark text-decoration-none"><small>Forgot password?</small></a>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success coin" name="login_action" >Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                    <style>
                                        button.coin{
                                            background: linear-gradient(90deg, #034fab 0%, #064aa8 4.58%, #202a95 44.13%, #30178a 77.34%, #361086 100%) !important;
                                            border: none !important;
                                        }
                                        button.coin:hover{
                                            color: #FFF !important;
                                        }
                                        .tx-blu{
                                            color: #0550e9 !important;
                                        }
                                        .tx-blu:hover{
                                            color: #0550f9 !important;
                                        }
                                    </style>

                                    <small class="text-muted">Don't have an account? <a href="sign-up.php" class="link-success text-decoration-none tx-blu">Register here</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 bg-light shadow-lg d-none d-lg-block" style="background-image: url(../img/back.jfif); background-size: cover;"></div>
                </div>
            </div>
        </section>
        <!-- section content end -->
    </main>

    
    
    <!-- javascript -->
    <script src="../js/vendors/bootstrap.min.js"></script>
    <script src="../js/utilities.min.js"></script>
    <script src="../js/config-theme.js"></script>
</body>


<!-- Mirrored from www.indonez.com/html-demo/Cirro/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Aug 2022 18:41:08 GMT -->

<!-- Mirrored from astromineoptions.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Dec 2022 00:21:07 GMT -->
</html>
