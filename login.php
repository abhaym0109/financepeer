<?php
//connectivity
$bgig='D:\Study\Financepeer website\bgimg.jpg';
 include('dbconn.php');
 #include('encdec.php');
 session_start();
 if(isset($_POST['login']))
 {
 $u = $_POST['uname'];
 $pass = $_POST['upass'];
 //user check
 #$pass= encrypt($pass,$key);
 $q = "SELECT * FROM registration WHERE account_no='$u' AND Password='$pass'";
 $cq = mysqli_query($con,$q);
 $ret = mysqli_num_rows($cq);
 if($ret == true)
 {
 $abc = mysqli_query($con,$ab);
 $_SESSION['uname']=$u;
 echo "<script>document.location='otp.php'</script>";
 }
 }


 ?>
<html>
 <style>
 body{
     background-color: lavender;
    /*background-image: url(bgimg.jpg);*/
 }
img{
 height:200px;
 width:autopx;
 margin-left:5px;
 margin-right:5px;
 }
 ul {
 list-style-type: none;
 margin: 10;
 padding: 5;
 overflow: hidden;
 background-color: skyblue;
}
li{
    float: left;
 display: inline-block;
 color: black;
 text-align: center;
 padding: 10px 110px;
 text-decoration: none;
}
li a:hover {
 background-color:deepskyblue;
}
 </style>
<body>
    <!--<center><img src='https://drive.google.com/file/d/1WuP-Oj4mnUnakvDuYslFC6klp-wyzggp/view?usp=sharing'></center>-->
    <ul>
        <li>Welcome to our website</li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="upload.php">Upload</a></li>
        <li><a href="about.php">About</a></li>
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





