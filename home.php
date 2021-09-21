<?php
include("dbconn.php");
?>
<style>
img{
 height:200px;
 width:autopx;
 margin-left:5px;
 margin-right:5px;
 }
ul {
 list-style-type: none;
 margin: 0;
 padding: 0;
 overflow: hidden;
 background-color: skyblue;
}
li {
 float: left;
}
li a {
 display: inline-block;
 color: black;
 text-align: center;
 padding: 10px 140px;
 text-decoration: none;
}
li a:hover {
 background-color:deepskyblue;
}
 body{
     background-color: lavender;
 }
</style>
<!--<center><img src="logo.png"></center>-->
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script
src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
$('.carousel').carousel();
});
</script>

<div align="center">
<h1 style="color:black">HOME</h1>
 <?php
 session_start();
 $u=$_SESSION["uname"];
// $sql = "SELECT * FROM registration WHERE Username='$u'";
//$result=mysqli_query($con,$sql);
// $row=mysqli_fetch_row($result);
//echo "<br>details      : ".$row[0];
 echo'Welcome, You are logged in '.'<br>';
echo "Account number   : ".$_SESSION["uname"];

//echo "Balance          : ".$row;
//echo "<br>mobile number: ".$row[5];
//echo "<br>address      : ".$row[6];

?>

</table>
</div>
</body>