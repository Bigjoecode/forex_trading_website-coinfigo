<?php
@define('DBSERVER', 'localhost');
@define('DBUSERNAME', 'coinmktg_gerald');
@define('DBPASSWORD', 'coinfigo100%');
@define('DBNAME', 'coinmktg_hello');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

