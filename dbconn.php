<?php
$user='root';
$pass='';

$db='financepeerdb'
$conn=new mysqli('localhost',$user,$pass,$db) or die("Connection not Established");

echo 'Connection established!';

 ?>