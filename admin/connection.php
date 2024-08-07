<?php
$server='localhost';
$user='root';
$pass='';
$db='today_news';
$conn=mysqli_connect($server,$user,$pass,$db) or die("connection failled: " . mysqli_connect_error());
?>