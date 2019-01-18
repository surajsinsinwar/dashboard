<?php

$servername="localhost";
$dBUsername="root";
$dbPassword="";
$dbName="School";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);

if (!$conn) {
	 
	 die("Connection Failed: ".mysql_connect_error());
	
}