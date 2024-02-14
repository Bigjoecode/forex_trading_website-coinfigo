<?php  
include 'session.php';
require_once '../phpmailer/PHPMailerAutoload.php';

global $sitemail, $sitename,$siteurl;

if (isset($_POST['amount']) && isset($_POST['units']) && isset($_POST['interval']) && isset($_POST['symbol']) && isset($_POST['direction'])) {
	
	$amount = text_input($_POST['amount']);
	$units = text_input($_POST['units']);
	$interval = text_input($_POST['interval']);
	$direction = text_input($_POST['direction']);
	$symbol = text_input($_POST['symbol']);
	
	$trade_type = $account_type;
	$trade_set = date('Y-m-d H:i:s');
	$trade_exp = date('Y-m-d H:i:s', strtotime($trade_set. ' +'.$interval.''));
	// $code = "01";
	// $win_loss = str_shuffle($code);
 //    $win_loss = substr($win_loss, 0, 1);
    $status = '1'; //Trade on going
    $getsignal = mysqli_query($link, "SELECT * FROM signals WHERE symbol = '$symbol' AND directions = '$direction' ");
    if (mysqli_num_rows($getsignal) > 0) {
    	$win_loss = "1";
    }else{
    	$win_loss = "0";
    }
	$insert = mysqli_query($link, "INSERT INTO trade (`email`, `trade_type`, `amount`, `symbol`, `units`, `trade_interval`, `market`, `status`, `trade_exp`, `trade_set`, `win_loss`) VALUES ('$email', '$trade_type', '$amount', '$symbol', '$units', '$interval', '$direction', '1', '$trade_exp', '$trade_set', '$win_loss' ) ");
	if ($insert) {
		switch ($account_type) {
			case 'live':
				$col = 'balance';
				break;
			case 'demo':
				$col = 'demo_balance';
				break;
			default:
				break;
		}
		mysqli_query($link, "UPDATE users SET $col = $col - '$amount' WHERE email = '$email' ");
		
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

		 $mail->Subject = "New Trade Made by ".$name;

		 $mail->Body = '<p>Dear Admin</p> 

		 <p>A client just executed a trade, here is the details of the client:</p>

		 <p>Name: '.$name.'</p>

		 <p>Amount: $'.$amount.'</p>

		 <p>Please confirm this transaction.</p>

		 <p>Regards,</p> 

		 <p>'.$sitename.'</p>';

		 $mail->send();
		 
		echo "Trade placed successfully !";
	}
}


// status = 1; trade on going
// status = 2; trade loss
// status = 3; trade win

?>