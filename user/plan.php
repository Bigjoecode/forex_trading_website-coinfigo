<?php  
include 'header.php';
require_once '../phpmailer/PHPMailerAutoload.php';

$msg = "";
global $sitemail, $sitename,$siteurl;

if (isset($_POST['request'])) {
	$plan_id = $_POST['plan_id'];
	$dele = mysqli_query($link, "DELETE FROM package_request WHERE email = '$email' ");
	if ($dele) {
		$insert = mysqli_query($link, "INSERT INTO package_request (email, plan_id) VALUES ('$email', '$plan_id') ");
		if ($insert) {
		    
            $result = mysqli_query($link, "SELECT * FROM package1 WHERE id='$plan_id'");
            $result_check = mysqli_num_rows($result);
            if($result_check > 0){
                while($data = mysqli_fetch_assoc($result)){
                    $pname = $data['pname'];
                    $percent_no =$data['increase'];
                    $duration = $data['duration'];
                }
            }
            
                 $subject = "Trading Package Request";
        		$body = "<h4> ".$name." </h4> <p> You have successfully made a request to subscribe to our ".$pname." package.</p> <p> You will receive a confirmation email shortly.</p> <p>If you have any questions, please contact support on our website or at <a href='mailto:support@coinfigo.com'>support@coinfigo.com</a> </p> <p>Join our Telegram and other media platforms. <br> Get an insight from other users about Coinfigo and their experiences. 300k+ members and counting. <a href='https://t.me/Coinfigotrades'>Join now</a> </p> <p>Regards,</p> <p>".$sitename."</p>";
        		sendMail($email, $name, $subject, $body);

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
        
                    $mail->Subject = "Trading Plan Request";
        
                    $mail->Body = '<p>Dear Admin</p> 
        
                    <p>A client just initiated a trading plan request, here is the details of the client request:</p>
        
                    <p>Plan Name: '.$pname.'</p>
        
                    <p>No. of percentage: '.$percent_no.'%</p>
        
        			<p>Duration: '.$duration.' days</p>
        
                    <p>Please confirm this request for approval.</p>
        
                    <p>Regards,</p> 
        
                    <p>'.$sitename.'</p>';
        
                    $mail->send();
                    
        			$msg = "Plan request sent. you will receive an email shortly";
		}
	}
	
}
?>



<div class="content-wrapper bg-dark">
<?php  
if ($msg != "") {
	echo "<script>
	Notiflix.Report.success(
	  'Request Sent',
	  '".$msg."',
	  'OK',
	  function cb() {
	   window.location.href = 'plan.php'
	  },
	);
</script>";
}
?>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class=" align-items-end flex-wrap">

                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Plan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-secondary coin"><b>Trading Packages</b></div>

                    <div class="row">
                    	<?php  
                    		$plan = mysqli_query($link, "SELECT * FROM package1 ");
                    		if (mysqli_num_rows($plan) > 0) {
                    			while ($pp = mysqli_fetch_assoc($plan)) {
                    	?>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <span style="font-size: 25px;"><?php echo strtoupper($pp['pname']) ?></span><br>
                                    PACKAGE<br><br>

                                    <div style="text-align: left;">

                                        <p>
                                            <span style="color: rgba(180, 180, 180, 0.7)">Mininum deposit</span> <br>
                                            <b>$<?php echo number_format($pp['froms'],2) ?></b>
                                        </p>

                                        <p>
                                            <span style="color: rgba(180, 180, 180, 0.7)">Maximum deposit</span> <br>
                                            <b>$<?php echo number_format($pp['tos'],2) ?></b>
                                        </p>

                                         <p>
                                            <b style=""><?php echo number_format($pp['increase'],2) ?>% for <?php echo $pp['duration'] ?>
                                                days</b>
                                        </p>

                                        <!--<p><span style="color: rgba(180, 180, 180, 0.7)">Max Spread</span> <br>
                                            <b>1.1</b>
                                        </p><br> -->

                                        <!-- <p style="color: rgba(180, 180, 180, 0.856)">Demo Trading</p> -->
                                        <!--<p style="color: rgba(180, 180, 180, 0.856)">Live Account</p>-->

                                        <!--<p style="color: rgba(180, 180, 180, 0.856)">Negative Balance Protection</p>-->
                                        <br>

                                        <p>
                                        <form action="plan.php" method="POST">
                                             <input type="hidden" name="plan_id" value="<?php echo $pp['id'] ?>">
                                         <?php  
                                         $planId = $pp['id'];
                                         	$reqch = mysqli_query($link, "SELECT * FROM package_request WHERE email = '$email' AND plan_id = '$planId' ");
                                         	if (mysqli_num_rows($reqch) == 1) {
                                         ?>
                                         	 <button type="submit" class="btn btn-sm btn-warning coin" disabled>Requested</button>
                                            <?php
                                             }else{
                                             ?>
                                             	<button type="submit" name="request" class="btn btn-sm btn-danger coin">Request
                                                Plan</button>

                                             <?php
                                             }
                                            ?>

                                            
                                        </form>
                                        <style>
                                            button.coin{
                                                background: linear-gradient(90deg, #034fab 0%, #064aa8 4.58%, #202a95 44.13%, #30178a 77.34%, #361086 100%) !important;
                                                color: #FFFFFF !important;
                                                border: none !important;
                                                box-shadow: 0px 0px 0px #0000 !important;
                                            }
                                            div.coin{
                                                background: linear-gradient(90deg, #034fab 0%, #064aa8 4.58%, #202a95 44.13%, #30178a 77.34%, #361086 100%) !important;
                                                color: #FFFFFF !important;
                                                border: none !important;
                                                box-shadow: 0px 0px 0px #0000 !important;
                                            }
                                        </style>
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <?php }
                    		} ?>
                        

                    </div>








                </div>



<?php  
include 'footer.php';
?>