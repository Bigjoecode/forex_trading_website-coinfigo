<?php 
include 'header.php';
// include "investors_query.php";
$sql3= "SELECT * FROM wbtc";
	  $result3 = mysqli_query($link,$sql3);
	  if(mysqli_num_rows($result3) > 0){
	  $total3= mysqli_num_rows($result3);
		
 	  }else{
		$total3 = 0  ;
		echo "error";
		exit;
	  }
	  
// $sql2= "SELECT * FROM users WHERE session = 1";
//       $result2 = mysqli_query($link,$sql2);
//       if(mysqli_num_rows($result2) > 0){
//       $total2= mysqli_num_rows($result2);
//       }else{
//     	$total2 = 0;
//       }

$sql= "SELECT * FROM users ";
	  $result = mysqli_query($link,$sql);
	  if(mysqli_num_rows($result) > 0){
      $total= mysqli_num_rows($result);
	  }else{
		$total = 0;
	  }
	  
    $sql_qry1="SELECT SUM(moni) AS count FROM wbtc ";
    $duration1 = $link->query($sql_qry1);
    while($record1 = $duration1->fetch_array()){
        $withdraw = $record1['count'];
	}
	
	$sql_qry="SELECT SUM(usd) AS counter FROM btc ";
    if($duration = $link->query($sql_qry)){
    while($record = $duration->fetch_array()){
        $deposit = $record['counter'];
    	}
    }else{
		$deposit = 0;
	  }
		  
$sql1= "SELECT * FROM btc";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){

  $total1= mysqli_num_rows($result1);
	
  }	else{
	$total1 = 0;
  }	
?>
<div class="page-content">
    <div class="container-fluid">
		<div class="row">
	        <div class="col-md-6">
	            <div class="card card-animate">
	                <div class="card-body">
	                    <div class="d-flex justify-content-between">
	                        <div>
	                            <p class="fw-medium text-muted mb-0">Total Investors</p>
	                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="" ><?php echo $total;?></span></h2>
	                        </div>
	                        <div>
	                            <div class="avatar-sm flex-shrink-0">
	                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
	                                    <i data-feather="users" class="text-info"></i>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                </div><!-- end card body -->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
	        <div class="col-md-6">
	            <div class="card card-animate">
	                <div class="card-body">
	                    <div class="d-flex justify-content-between">
	                        <div>
	                            <p class="fw-medium text-muted mb-0">Total Invested</p>
	                            <h2 class="mt-4 ff-secondary fw-semibold">$<span class="" ><?php echo $total1 ;?></span></h2>
	                            
	                        </div>
	                        <div>
	                            <div class="avatar-sm flex-shrink-0">
	                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
	                                    <i class="ri-arrow-left-down-fill text-info"></i>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                </div><!-- end card body -->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
        </div> <!-- end row-->
        <div class="row">
	        <div class="col-md-6">
	            <div class="card card-animate">
	                <div class="card-body">
	                    <div class="d-flex justify-content-between">
	                        <div>
	                            <p class="fw-medium text-muted mb-0">Requested Withdrawal</p>
	                            <h2 class="mt-4 ff-secondary fw-semibold">$<span class="" ><?php echo $total3;?></span></h2>
	                        </div>
	                        <div>
	                            <div class="avatar-sm flex-shrink-0">
	                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
	                                    <i class="text-info ri-arrow-right-up-line"></i>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                </div><!-- end card body -->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
	       	<div class="col-md-6">
	            <div class="card card-animate">
	                <div class="card-body">
	                    <div class="d-flex justify-content-between">
	                        <div>
	                            <p class="fw-medium text-muted mb-0">Total Amount Withdrawn</p>
	                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="" data-target="">$<?php echo round($withdraw,2);?></span></h2>
	                        </div>
	                        <div>
	                            <div class="avatar-sm flex-shrink-0">
	                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
	                                    <i  class="text-info ri-arrow-go-back-line"></i>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                </div><!-- end card body -->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
	        <div class="col-md-6">
	            <div class="card card-animate">
	                <div class="card-body">
	                    <div class="d-flex justify-content-between">
	                        <div>
	                            <p class="fw-medium text-muted mb-0">Total Amount deposited</p>
	                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="" data-target="">$<?php echo round($deposit,2);?></span></h2>
	                        </div>
	                        <div>
	                            <div class="avatar-sm flex-shrink-0">
	                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
	                                    <i  class="text-info ri-arrow-go-back-line"></i>
	                                </span>
	                            </div>
	                        </div>
	                    </div>
	                </div><!-- end card body -->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
        </div> <!-- end row-->
    </div>
</div>
<?php 
include 'footer.php';
?>