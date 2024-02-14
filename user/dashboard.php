<?php  
include 'header.php';


$qq = mysqli_query($link, "SELECT * FROM trade WHERE email = '$email' ORDER BY id DESC ");
    if (mysqli_num_rows($qq) > 0) {
        while ($tr = mysqli_fetch_assoc($qq)) {
            $status = $tr['status'];
            $trade_type = $tr['trade_type'];
            $amount = $tr['amount'];
            $symbol = $tr['symbol'];
            $units = $tr['units'];
            $trade_interval = $tr['trade_interval'];
            $market = $tr['market'];
            $profit = $tr['profit'];
            $trade_exp = $tr['trade_exp'];
            $trade_set = $tr['trade_set'];
            $win_loss = $tr['win_loss'];
            $tid = $tr['id'];
            $credited = $tr['credited'];

            $current_time = date('Y-m-d H:i:s');

            if ($trade_exp == $current_time || $current_time >= $trade_exp) {
                //the status
                if ($win_loss == 1) {
                    $status = 3;
                }elseif ($win_loss == 0) {
                    $status = 2;
                }
                //profit
                if ($win_loss == 1) {
                    $profit = (90/100)*$amount;
                }elseif ($win_loss == 0) {
                    $profit = 0;
                }
                $update = mysqli_query($link, "UPDATE trade SET status = '$status', profit = '$profit', credited = 1 WHERE id = '$tid' ");
                //credit user profit
                if ($update && $credited == 0) {
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
                    $upuser = mysqli_query($link, "UPDATE users SET $col = $col + '$profit' WHERE email = '$email' " );
                }
            }else{

            }


    }
}






$sql= "SELECT * FROM stakes WHERE email='$email' ORDER BY id DESC ";
              $result = mysqli_query($link,$sql);
              if(mysqli_num_rows($result) > 0){
                  $is_yes = 1;
                  while($row = mysqli_fetch_assoc($result)){   
                      
                     $pdate = $row['pdate'];
                     $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
  $uid = $row['id'];
                     
$date = $row['pdate'];
$payday = $row['payday'];
$lprofit = $row['lprofit'];

$paypackage = new DateTime($payday);
 $payday = $paypackage->format('Y/m/d');

            
            if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
                
                if($row['activate'] == 0){
                    $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $days=0;
                }else{
                    
            
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));
 $one = 1;

          $date3 = new DateTime($Date2);
           $date3->modify( '+'. $one.'day');
           $date4 = $date3->format('Y/m/d');

  $days=floor($diff / (60*60*24));
 
 
$daily = $duration - $days;

 $one = 1;
$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));




if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d")) || (date("Y/m/d")) >= $Date2  ){
    
    
    $percentage = ($increase/100) * $duration * $usd;
    $allprofit = $percentage - $lprofit;
       $pp =   $allprofit;   
       $ppr = $pp + $usd;
    
    $_SESSION['pprofit'] = $percentage;
     $sql = "UPDATE users SET balance = balance + $pp  WHERE email='$email'";
     
      $sql13 = "UPDATE stakes SET activate = '0', profit = '$percentage', payday = '$current'  WHERE email='$email' AND id = '$uid'";
     
     
  if(mysqli_query($link, $sql)){
    mysqli_query($link, $sql13);
    
    $percentage = $pp = 0;
    
        $Date2 = 0;
    $current = 0;
    $duration = 0;

    $days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
    $days = 0;

    $current = 0;
    $duration = 0;

  }
}else{
    
    if($payday == $current){
        
    }else{
        
    $percentage = ($increase/100) * $daily * $usd;
    
    $allprofit = $percentage - $lprofit;
    
     $sql131 = "UPDATE stakes SET profit = '$percentage', payday = '$current', lprofit = '$percentage' WHERE email='$email' AND id = '$uid'";
      $sql21 = "UPDATE users SET balance = balance + $allprofit WHERE email='$email'";
     
     mysqli_query($link, $sql131);
     mysqli_query($link, $sql21);
    }
     

}





     
$add="days";
            }    
 }
}
}


?>


<div class="content-wrapper bg-dark">





                    <style>
                        .overview-div {
                            border-left: solid 1px rgba(100, 100, 100, 0.2);
                            padding: 10px;
                        }

                        .icon-big {
                            font-size: 30px;
                        }

                        .card-category {
                            color: rgba(160, 160, 160, 0.91)
                        }
                    </style>

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class=" align-items-end flex-wrap">
                                    <div class="me-md-3 me-xl-5">
                                        <span style="font-size:22px">Welcome, <?php echo ucfirst($fname) ?>!</span>

                                    </div>
                                    <div class="d-flex">
                                        <i class="fa fa-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end flex-wrap">
                                    <button type="button" onclick="window.location='profile.php'"
                                        class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                        <!-- <i class="mdi mdi-account "></i> -->
                                        <i class="fa fa-user text-muted"></i>
                                    </button>
                                    <button type="button" onclick="window.location='transactions.php'"
                                        class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                        <!-- <i class="mdi mdi-clock-outline text-muted"></i> -->
                                        <i class="fas fa-clock text-muted"></i>
                                    </button>
                                    <button class="btn btn-primary mt-2 mt-xl-0"
                                        onclick="window.location='deposit.php'">Deposit</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="background-color: rgba(0, 0, 0, 0.311); width:100%; height:auto;" class="mb-4">
                        <div
                            style="width: 100%; height: auto; padding:10px 20px 0px 20px; margin-top:0px; background-color: rgba(0,0,0,0); z-index: 2;">
                            <br>
                            <div class="tradingview-widget-container" style="margin-top: -30px;">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
                                    async>
                                        {
                                            "symbols": [{
                                                "proName": "FOREXCOM:SPXUSD",
                                                "title": "S&P 500"
                                            },
                                            {
                                                "proName": "FOREXCOM:NSXUSD",
                                                "title": "Nasdaq 100"
                                            },
                                            {
                                                "proName": "FX_IDC:EURUSD",
                                                "title": "EUR/USD"
                                            },
                                            {
                                                "proName": "BITSTAMP:BTCUSD",
                                                "title": "BTC/USD"
                                            },
                                            {
                                                "proName": "BITSTAMP:ETHUSD",
                                                "title": "ETH/USD"
                                            }
                                            ],
                                                "colorTheme": "dark",
                                                    "isTransparent": true,
                                                        "displayMode": "regular",
                                                            "locale": "en"
                                        }
                                    </script>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        



                        <?php

                            
                            if (isset($_GET['unit']) && $_GET['unit'] == 'cfd') {
                                 include 'cfd.php';
                            }elseif (isset($_GET['unit']) && $_GET['unit'] == 'crypto') {
                                include 'crypto.php';
                            }elseif (isset($_GET['unit']) && $_GET['unit'] == 'stock') {
                                include 'stock.php';
                            }elseif (isset($_GET['unit']) && $_GET['unit'] == 'futures') {
                                include 'futures.php';
                            }else{
                                include 'forex.php';
                            }

                        ?>

                    </div>

                    <div class="modal fade" id="buy-trade-modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false"
                        data-backdrop="static" style="margin-top: -100px;">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pb-4">

                                    <div id="buychart" class="w-100">
                                        <p id="tradeBuySymbolName"></p>
                                        <div class="tradingview-widget-container"
                                            style="height: 150px; border: solid 1px rgb(89, 89, 89)">
                                            <div class="tradingview-widget-container__widget"></div>
                                        </div>
                                    </div>
                                    <form id="buy-trade-form">
                                        <div class="w-100">
                                            <div class="row mt-3">
                                                <div class="col-md-4 col-4">
                                                    <input type="number" name="amount" class="trade-input"
                                                        id="buy-amount" placeholder="Amount">
                                                </div>
                                                <div class="col-4">
                                                    <select class="trade-input" name="units" id="buy-units">
                                                        <option value="">Units</option>
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                        <option value='5'>5</option>
                                                        <option value='6'>6</option>
                                                        <option value='7'>7</option>
                                                        <option value='8'>8</option>
                                                        <option value='9'>9</option>
                                                        <option value='10'>10</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <select class="trade-input" name="interval">
                                                        <option value="1 minute">1 minute</option>
                                                        <option value="3 minutes">3 minutes</option>
                                                        <option value="5 minutes">5 minutes</option>
                                                        <option value="10 minutes">10 minutes</option>
                                                        <option value="20 minutes">15 minutes</option>
                                                        <option value="30 minutes">30 minutes</option>
                                                        <option value="45 minutes">45 minutes</option>
                                                        <option value="60 minutes">1 hour</option>
                                                        <option value="120 minutes">2 hours</option>
                                                        <option value="1440 minutes">1 day</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="symbol" value="" id="buy-symbol">
                                                <input type="hidden" name="direction" value="buy">
                                            </div>

                                        </div>

                                        <div class="w-100 mt-3" style="text-align:center;">
                                            <p class="text-success">YOU ARE BUYING THE UNDERLYING ASSET</p>
                                        </div>

                                    </form>

                                    <button class="btn btn-md w-100 mt-2 text-white" id="buy-trade-btn"
                                        style="background-color: rgb(31, 105, 84);">OPEN THIS TRADE</button>

                                    <div style="text-align: right;" class="mt-4">
                                        <button class="btn btn-sm btn-danger" id="close-trade-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9.414l2.828-2.829 1.415 1.415L13.414 12l2.829 2.828-1.415 1.415L12 13.414l-2.828 2.829-1.415-1.415L10.586 12 7.757 9.172l1.415-1.415L12 10.586z"
                                                    fill="rgba(255,255,255,1)"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="sell-trade-modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false"
                        data-backdrop="static" style="margin-top: -100px;">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pb-4">
                                    <div id="sellchart" class="w-100">
                                        <p id="tradeSellSymbolName"></p>
                                        <div class="tradingview-widget-container"
                                            style="height: 150px; border: solid 1px rgb(89, 89, 89)">
                                            <div class="tradingview-widget-container__widget"></div>
                                        </div>
                                    </div>

                                    <form id="sell-trade-form">
                                        <div class="w-100">
                                            <div class="row mt-3">
                                                <div class="col-md-4 col-4">
                                                    <input type="number" class="trade-input" name="amount"
                                                        id="sell-amount" placeholder="Amount">
                                                </div>
                                                <div class="col-4">
                                                    <select class="trade-input" name="units" id="sell-units">
                                                        <option value="">Units</option>
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                        <option value='5'>5</option>
                                                        <option value='6'>6</option>
                                                        <option value='7'>7</option>
                                                        <option value='8'>8</option>
                                                        <option value='9'>9</option>
                                                        <option value='10'>10</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <select class="trade-input" name="interval">
                                                        <option value="1 minute">1 minute</option>
                                                        <option value="3 minutes">3 minutes</option>
                                                        <option value="5 minutes">5 minutes</option>
                                                        <option value="10 minutes">10 minutes</option>
                                                        <option value="20 minutes">15 minutes</option>
                                                        <option value="30 minutes">30 minutes</option>
                                                        <option value="45 minutes">45 minutes</option>
                                                        <option value="60 minutes">1 hour</option>
                                                        <option value="120 minutes">2 hours</option>
                                                        <option value="1440 minutes">1 day</option>
                                                    </select>
                                                </div>

                                                <input type="hidden" name="symbol" value="" id="sell-symbol">
                                                <input type="hidden" name="direction" value="sell">
                                            </div>
                                        </div>

                                        <div class="w-100 mt-3" style="text-align:center;">
                                            <p class="text-danger">YOU ARE SELLING THE UNDERLYING ASSET</p>
                                        </div>

                                    </form>

                                    <button class="btn btn-md w-100 mt-2 text-white" id="sell-trade-btn"
                                        style="background-color: rgba(196, 61, 41, 0.997)">OPEN THIS TRADE</button>

                                    <div style="text-align: right;" class="mt-4">
                                        <button class="btn btn-sm btn-danger" id="close-trade-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9.414l2.828-2.829 1.415 1.415L13.414 12l2.829 2.828-1.415 1.415L12 13.414l-2.828 2.829-1.415-1.415L10.586 12 7.757 9.172l1.415-1.415L12 10.586z"
                                                    fill="rgba(255,255,255,1)"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function () {

                            $(document).on('click', '#buy-trade-btn', function () {
                                if ($("#buy-amount").val() == '') {
                                    Notiflix.Notify.failure('The amount field is required');
                                }

                                if ($("#buy-units").val() == '') {
                                    Notiflix.Notify.failure('The units field is required');
                                }

                                if ($("#buy-amount").val() !== '' && $("#buy-units").val() !== '') {
                                    if (parseInt($("#buy-amount").val()) > <?php echo $bal ?> ) {
                                        Notiflix.Notify.failure('Insufficient Balance');
                                    } else {
                                        Notiflix.Confirm.show(
                                            'Confirm',
                                            'You are about to open ' + $('#buy-symbol').val() + ' trade ',
                                            'Yes',
                                            'No',
                                            () => {
                                                $('#buy-trade-form').submit()
                                            },
                                        );
                                    }

                                }
                            });

                            $(document).on('click', '#sell-trade-btn', function () {
                                if ($("#sell-amount").val() == '') {
                                    Notiflix.Notify.failure('The amount field is required');
                                }

                                if ($("#sell-units").val() == '') {
                                    Notiflix.Notify.failure('The units field is required');
                                }

                                if ($("#sell-amount").val() !== '' && $("#sell-units").val() !== '') {
                                    if (parseInt($("#sell-amount").val()) > <?php echo $bal ?> ) {
                                        Notiflix.Notify.failure('Insufficient Balance');
                                    } else {
                                        Notiflix.Confirm.show(
                                            'Confirm',
                                            'You are about to open ' + $('#sell-symbol').val() + ' trade ',
                                            'Yes',
                                            'No',
                                            () => {
                                                $('#sell-trade-form').submit()
                                            },
                                        );
                                    }

                                }
                            });

                            $(document).on('submit', '#buy-trade-form', function (e) {

                                e.preventDefault();
                                $("#buy-trade-btn").prop("disabled", true);

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    url: "trade.php",
                                    type: "POST",
                                    data: new FormData(this),
                                    contentType: false, // The content type used when sending data to the server.
                                    cache: false, // To unable request pages to be cached
                                    processData: false,
                                    success: function (e) {
                                        Notiflix.Report.success(
                                            'Placed',
                                            e + '<br><br>',
                                            'Okay',
                                            () => {
                                                window.location.href = "trade-history.php"
                                            }
                                        );
                                    },
                                    error: function (e) {
                                        if (e.status === 422) {
                                            Object.entries(e.responseJSON.errors).forEach(element => {
                                                Notiflix.Notify.failure(element[1][0]);
                                            });
                                        }
                                        if (e.status === 400) {
                                            Notiflix.Notify.failure(e.responseJSON.message);
                                        }
                                        $("#buy-trade-btn").prop("disabled", false);
                                    }
                                });
                            })

                            $(document).on('submit', '#sell-trade-form', function (e) {

                                e.preventDefault();
                                $("#sell-trade-btn").prop("disabled", true);

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    url: "trade.php",
                                    type: "POST",
                                    data: new FormData(this),
                                    contentType: false, // The content type used when sending data to the server.
                                    cache: false, // To unable request pages to be cached
                                    processData: false,
                                    success: function (e) {
                                        Notiflix.Report.success(
                                            'Placed',
                                            e + '<br><br>',
                                            'Okay',
                                            () => {
                                                window.location.href = "trade-history.php"
                                            }
                                        );
                                    },
                                    error: function (e) {
                                        if (e.status === 422) {
                                            Object.entries(e.responseJSON.errors).forEach(element => {
                                                Notiflix.Notify.failure(element[1][0]);
                                            });
                                        }
                                        if (e.status === 400) {
                                            Notiflix.Notify.failure(e.responseJSON.message);
                                        }
                                        $("#sell-trade-btn").prop("disabled", false);
                                    }
                                });
                            })

                            $(document).on('click', '#trade-buy-btn', function () {
                                let e_ = $(this);

                                var my_awesome_script = document.createElement('script');

                                my_awesome_script.setAttribute('src',
                                    "https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js");
                                my_awesome_script.textContent = `
                    {
                    "symbol": "${e_.data('tv-symbol')}",
                    "width": "100%",
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "locale": "en"
                    }
                `;
                                my_awesome_script.async = true
                                document.querySelector('#buychart div').appendChild(my_awesome_script);
                                $('#tradeBuySymbolName').html(e_.data('symbol'))
                                $('#buy-symbol').val(e_.data('symbol'))
                                $('#buy-trade-modal').modal('show');
                            })

                            $(document).on('click', '#trade-sell-btn', function () {
                                let e_ = $(this);

                                var my_awesome_script = document.createElement('script');

                                my_awesome_script.setAttribute('src',
                                    "https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js");
                                my_awesome_script.textContent = `
                    {
                    "symbol": "${e_.data('tv-symbol')}",
                    "width": "100%",
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "locale": "en"
                    }
                `;
                                my_awesome_script.async = true
                                document.querySelector('#sellchart div').appendChild(my_awesome_script);
                                $('#tradeSellSymbolName').html(e_.data('symbol'))
                                $('#sell-symbol').val(e_.data('symbol'))
                                $('#sell-trade-modal').modal('show');
                            })

                            $(document).on('click', '#close-trade-modal', function () {
                                $('#buy-trade-modal').modal('hide');
                                $('#sell-trade-modal').modal('hide');
                                $('#tradeBuySymbolName').html('');
                                $('#tradeSellSymbolName').html('');
                                $('#buychart div').html('');
                                $('#sellchart div').html('');
                                $('#buy-symbol').val('')
                                $('#sell-symbol').val('')
                                $('#buy-amount').val('')
                                $('#sell-amount').val('')
                                $('#buy-units').val('')
                                $('#sell-units').val('')
                            })

                        });

        // Toastify({
        //     text: "This is a toast",
        //     duration: 3000,
        //     destination: "https://github.com/apvarun/toastify-js",
        //     newWindow: true,
        //     close: true,
        //     gravity: "top", // `top` or `bottom`
        //     position: "left", // `left`, `center` or `right`
        //     stopOnFocus: true, // Prevents dismissing of toast on hover
        //     style: {
        //         background: "linear-gradient(to right, #00b09b, #96c93d)",
        //     },
        //     onClick: function() {} // Callback after click
        // }).showToast();
                    </script>


<?php  
include 'footer.php';
?>

                </div>

