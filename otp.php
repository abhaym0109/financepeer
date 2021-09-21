<html>
 <head>
 <title> OTP Authentication </title>
 <style type="text/css">
     body{
         background-color: lavender;
     }
 h1 {font-size:50px;}
 #abc {font-size:20px;}
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
 </style>
 </head>
 <body>
 <!--<center><img src="vit_logo.png"></center>-->
 <center> <h1> OTP Authentication </h1>
 <?php
 include("dbconn.php");
 if(isset($_POST['send']))
 {
// require('textlocal.class.php');
// require('details.php');
// $textlocal = new Textlocal(false,false,API_KEY);
// $numbers = array(Mobile);
// $sender ='TXTLCL';
 $otp = mt_rand(10000,99999);
 $message = "Hello " . $_POST['name'] . " This is your OTP: " . $otp;
 try {
// $result = $textlocal->sendSms($numbers, $message, $sender);
 $sql="Insert into expire_otp(otp,is_expired,created_at) values('$otp','0',now())";
 $reg=mysqli_query($con,$sql);
 if($reg==true){
 setcookie('otp',$otp);
 echo "OTP successfully sent...";
 }
 else {
     echo 'otp not Sent';
 }
 }
 catch (Exception $e)
 {
 die('Error: ' . $e->getMessage());
 }
 }
 if(isset($_POST['verify']))
 {
 $otp=$_POST['otp'];
 if($_COOKIE['otp']==$otp)
 {
     $sql="update expire_otp set is_expired='1' where otp='$otp'";
     $reg=mysqli_query($con,$sql);
 echo "Congratulations! Your OTP is verified";
 echo "<script>document.location='home.php'</script>";
 }
 else
 echo "Please enter the correct OTP";
 }
 ?>
 <form method="post">
 <table>
 <div id="abc"> <tr> <td>Name: </td> <td> <input type="text" name="name"
id="uname" placeholder="Enter your name"> </td> </tr>
 <tr> <td> Mobile: </td> <td> <input type="text" name="mobile" id="mobile"
placeholder="Enter your mobile number"> </td> </tr>
 </table>
 <input type="submit" value="Send OTP" id="send" name="send"> <br>
 </form> <br>
 <form method="post">
 <table>
 <tr> <td> OTP: </td> <td> <input type="text" name="otp" id="otp" placeholder="Enter
OTP"> </td>
 </table>
 <input type="submit" value="Verify" id="verify" name="verify"> <br>
 </form>
 </center>
 </body>
</html>