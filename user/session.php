<?php 
@session_start();

include '../config/db.php';
include '../config/config.php'; 
include '../config/functions.php';

	if (isset($_SESSION['user_mail']) && $_SESSION['user_mail'] != ""  ) {
		$usere = $_SESSION['user_mail'];
		$query = mysqli_query($link, "SELECT * FROM users WHERE email = '$usere'  ");
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
			$userId = $data['id'];
			$fname = $data['fname'];
			$lname = $data['lname'];
			$name = $fname." ".$lname;
			$email = $data['email'];
			$phone = $data['phone'];
			$password = $data['password'];
			$country = $data['country'];
			$fa2 = $data['2fa'];
			$gender = $data['gender'];
			$balance = $data['balance'];
			$date = $data['date'];
			$id_type = $data['id_type'];
			$id_image = $data['id_image'];
			$verify = $data['verify'];
			$demo_balance  = $data['demo_balance'];
			$account_type  = $data['account_type'];

			if ($account_type == 'live') {
			    $bal = $balance; //use live balance
			}else{
			    $bal = $demo_balance; //use demo balance
			}


		}else{
			echo "<script>window.location.href = '../auth/login.php' </script>";
		}
	}else{
		echo "<script>window.location.href = '../auth/login.php' </script>";
	}
?>