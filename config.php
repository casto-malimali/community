<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'project';

mysqli_report(MYSQLI_REPORT_ERROR);
//$
$conn = mysqli_connect($host, $user,$password, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}


?>