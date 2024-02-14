<?php  
session_start();
require_once '../phpmailer/PHPMailerAutoload.php';
include '../config/db.php';
include '../config/config.php';
include '../config/functions.php';

$err = $msg = "";
global $sitemail, $sitename,$siteurl;

if (isset($_SESSION['2fa_login'])) {
    $login_email = $_SESSION['2fa_login'];
    $qq = mysqli_query($link, "SELECT * FROM users WHERE email = '$login_email' ");
    if (mysqli_num_rows($qq) > 0) {
        $data = mysqli_fetch_assoc($qq);
        $fname = $data['fname'];
        $lname = $data['lname'];
        $fa2_code = $data['2fa_code'];
        $email = $data['email'];
        $password = $data['password'];
    }
}else{
    echo pageRedirect("0", "login.php");
}

if (isset($_POST['submit'])) {
    $otp = text_input($_POST['otp']);
    if($otp == $fa2_code){
        if($_SESSION['activate'] == 1){
        $name = $fname." ".$lname;
        $subject = "Activation Successful";
        $body = "<h5>Hi ".$name.",</h5> <p>Thank you for completing your account opening with Coinfigo. Below is your login details: <h5> <strong>Username:</strong> </h5> <p>".$email."</p> <h5> <strong>Password:</strong> </h5> <p>".$password."</p> <p>If you have any questions, please contact support on our website or at <a href='mailto:support@coinfigo.com'>support@coinfigo.com</a> </p> <p>Join our Telegram and other media platforms. <br> Get an insight from other users about Coinfigo and their experiences. 300k+ members and counting. <a href='https://t.me/Coinfigotrades'>Join now</a> </p> <p>Regards,</p> <p>".$sitename."</p> ";
        $send = sendMail($email, $name, $subject, $body);
        unset($_SESSION['activate']);
        
        //PHPMailer Object
            $mail = new PHPMailer;
            $mail->isSMTP();
            // $mail->SMTPDebug = 2;
            $mail->Host='www.'.$siteurl;
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username=$sitemail;
            $mail->Password='coinfigo@100%';

            $mail->setFrom($sitemail,$sitename);
            $mail->FromName = $sitename;
            $mail->addAddress("$sitemail");
            $mail->addReplyTo($sitemail,$sitename);

            //Send HTML or Plain Text email
            $mail->isHTML(true);

            $mail->Subject = "New Registration";

            $mail->Body = '<p>Dear Admin</p> 

            <p>A new client just registered and activated an account on your website:</p>

            <p>The details of the registration is as follow:</p>

            <p>Name: '.$fname." ".$lname.'</p>

            <p>Email: '.$email.'</p>

            <p>Regards,</p> 

            <p>'.$sitename.'</p>';

            $mail->send();
        }
        $_SESSION['user_mail'] = $login_email;
        unset($_SESSION['otp']);
        echo "<script>window.location.href = '../user/dashboard.php' </script>";
    }else{
        $err = "Invalid OTP";
    }
}

?>
<!doctype html>
<html lang="en">


<!-- Mirrored from www.indonez.com/html-demo/Cirro/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Aug 2022 18:41:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="Trade">
    <meta name="author" content="coinfigo">
    <meta name="theme-color" content="#2E89EA" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../logo2.jpg" type="image/png">
    <!-- Touch icon -->
    <link rel="apple-touch-icon-precomposed" href="../logo2.jpg">
    <title>Auth OTP - COINFIGO</title>

    <script src="../dash/js/jquery-3.2.1.min.js"></script>
    <script src="../dash/notiflix-Notiflix-dfaf93f/dist/notiflix-aio-3.2.5.min.js"></script>
    <link rel="stylesheet" href="user/dash/css/style.css">
    <link rel="stylesheet" href="user/dash/css/user-custom.css">
    <script src="user/dash/notiflix-aio-3.2.5.min.js"></script>
    <script src="user/js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <!-- page loader begin -->
    <!--<div-->
    <!--    class="page-loader w-100 h-100 bg-white d-flex justify-content-center align-items-center position-fixed overflow-hidden">-->
    <!--    <div class="spinner-grow spinner-grow-sm text-primary"></div>-->
    <!--    <div class="spinner-grow spinner-grow-sm text-primary"></div>-->
    <!--    <div class="spinner-grow spinner-grow-sm text-primary"></div>-->
    <!--</div>-->
    <!-- page loader end -->
    <main>
        <form action="../user/logout.php" method="post" id="logoutForm"></form>
        <form action="resend.php" method="post" id="otpResendForm">
            <input type="hidden" name="resend">
            <input type="hidden" name="email" value="<?php echo $email ?>">
        </form>
        <!-- section content begin -->
        <section>
            <div class="container-fluid overflow-hidden">
                <div class="row vh-100">

                    <div class="col-md-12 col-lg-6 d-flex align-items-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="text-center">
                                    <a class="navbar-brand" href="index-2.html">
                                        <img src="/logo.png" alt="logo" height="36" class="d-inline-block">
                                    </a>
                                    <p class="lead mt-1 mb-3"><?php if($_SESSION['otp'] == 2){ echo "Welcome Back ".ucfirst($fname)."!"; }else{ echo "Welcome ".ucfirst($fname)."!"; } ?></p>
                                    <?php  
                                        if (isset($_GET['resend'])) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Thanks for signing up with Coinfigo - you number one crypto trading and staking platform.<br>
                                         One time password has been sent to your mail
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                <?php } ?>
                                    <?php
                                    if($_SESSION['otp'] == 2){
                                        echo '<h6 class="font-weight-bold mt-4">Two Factor Authentication</h6>
                                        <p class="mb-4" style="font-size: 13px;">A one time password has been sent to
                                        '.$login_email.'.
                                        Kindly input the OTP below. </p>
                                        ';
                                    }else{
                                        echo '<h6 class="font-weight-bold mt-4">Activation Code</h6>
                                        <p class="mb-4" style="font-size: 13px;">A one time password has been sent to
                                        '.$login_email.'.
                                        Kindly input the CODE below to activate your account. </p>
                                        ';
                                    }
                                    ?>
                                        <?php  
if ($msg != "") {
	echo userAlert("success", $msg);
}

if ($err != "") {
	echo userAlert("error", $err);
}
?>
                                    <!-- login form begin -->
                                    <form class="mb-2" method="POST" action="2fa.php">
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="text"  name="otp" class="form-control"
                                                        placeholder="<?php if($_SESSION['otp'] == 2){ echo 'OTP'; }else{ echo 'CODE'; } ?>" aria-label="CODE">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-lock fa-xs text-muted"></i></span>
                                                </div>
                                            </div>

                                            <br><br><br>

                                            <small class="text-muted">Did not receive a <?php if($_SESSION['otp'] == 2){ echo 'OTP'; }else{ echo 'CODE'; } ?> ? <a href="javascript:void()"
                                                    id="otpResendBtn"
                                                    class="link-primary text-decoration-none tx-blu">Resend</a></small>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary coin"
                                                    name="submit"><?php if($_SESSION['otp'] == 2){ echo 'Authenticate'; }else{ echo 'Activate'; } ?></button>
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

                                    <small class="text-muted"><a href="javascript:void()" id="logoutBtn"
                                            class="link-primary text-decoration-none tx-blu">Logout</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 bg-light shadow-lg d-none d-lg-block" style="background-image: url(..//img/back.jfif); background-size: cover;"></div>
                </div>
            </div>
        </section>
        <!-- section content end -->
    </main>



    <script>
        // $(document).ready(function() {
        //     alert('hello9')
        // })

        $(document).on('click', '#logoutBtn', function() {
            $('#logoutForm').submit();
        })

        $(document).on('click', '#otpResendBtn', function() {
            $('#otpResendForm').submit();
        })
    </script>
    <!-- javascript -->
    <script src="../js/vendors/bootstrap.min.js"></script>
    <script src="../js/utilities.min.js"></script>
    <script src="../js/config-theme.js"></script>
</body>


<!-- Mirrored from www.indonez.com/html-demo/Cirro/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Aug 2022 18:41:08 GMT -->

</html>
