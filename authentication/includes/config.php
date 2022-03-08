<?php
$dbServer = 'localhost';
$user = 'root';
$password = '';
$dbName = 'beemusic';
$dbPort = 9000;

ob_start();
$tz = date_default_timezone_set('Asia/Ho_Chi_Minh');
$db_connection = mysqli_connect($dbServer, $user, $password, $dbName, $dbPort);

if (mysqli_connect_errno()) {
    var_dump('failed to connect to the db ' . $dbName . " at server " . $dbServer);
    var_dump('error ' . mysqli_connect_errno());
}

?>