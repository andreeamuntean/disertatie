<?php
$server = "localhost";
$dbuser = "root";
#vertigod_app
$dbpass = "parola";
#*5MXGJ93DJ@8
$dbname = "safemeds";
#vertigod_app

$conn = mysqli_connect($server, $dbuser, $dbpass); //deschide conexiunea cu MySQL
mysqli_select_db($conn, $dbname);

session_start();
?>