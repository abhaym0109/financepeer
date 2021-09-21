<?php
//connectivity
 include('dbconn.php');
 include('encdec.php');
 session_start();
 if(isset($_POST['login']))
 {
 $u = $_POST['uname'];
 $pass = $_POST['upass'];
 //user check
 $pass= encrypt($pass,$key);
 $q = "SELECT * FROM registration WHERE Username='$u' AND Password='$pass'";
 $cq = mysqli_query($con,$q);
 $ret = mysqli_num_rows($cq);
 if($ret == true)
 {
 $ab = "SELECT attempt FROM registration WHERE Username = '$u'";
 $abc = mysqli_query($con,$ab);
 $w = mysqli_fetch_array($abc);
 if ($w[0] > 3)
 echo "<center><h2 style='color:red'>ACCOUNT LOCKED. CONTACT
ADMINISTRATOR</h2></center>";
else
 {
 $ab = "UPDATE registration SET attempt = 0 WHERE Username = '$u'";
 $abc = mysqli_query($con,$ab);
 $_SESSION['uname']=$u;
 echo "<script>document.location='otp.php'</script>";
 }
 }
 else
 {
 $ab = "UPDATE registration SET attempt = attempt + 1 WHERE Username = '$u'";
 $abc = mysqli_query($con,$ab);
 $abd = "SELECT attempt FROM registration WHERE Username = '$u'";
 $abe = mysqli_query($con,$abd);
 $w = mysqli_fetch_array($abe);
 if ($w[0] > 3)
 echo "<center><h2 style='color:red'>ACCOUNT LOCKED. CONTACT
ADMINISTRATOR</h2></center>";
 echo "<center><h2 style='color:red'>ACCESS DENIED</h2></center>";
 }
 }

 ?>
<html>
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
 padding: 10px 90px;
 text-decoration: none;
}
li a:hover {
 background-color:deepskyblue;
}
 body{
background-image: url("6.jpg");
 }
 </style>
<body>
<center><img src="vit_logo.png"></center>
<ul>
 <li><a href="about.php">About</a></li>
 <li><a href="project.php">Gallery</a></li>
 <li><a href="contact.php">Contact</a></li>
 <li><a href="courses.php">Courses</a></li>
 <li><a href="registration.php">Registration</a></li>
 <li><a href="login.php">Login</a></li>
</ul>
<div align="center">
<form method="post">
<fieldset style="display: inline-flex; background-color: aliceblue;"><legend><font
size="+2"><strong>Login Panel</strong></font></legend><p><b>UserName : </b><input
type="text" name="uname" required/></p>
<p><b>Password : </b><input type="password" name="upass" required/></p><br>
<p><input type="submit" value="Login" name="login"/></p>
</fieldset>
</form>
</div>
</body>
</html>





