<html>
<head>
 <title>Registration</title>
 <style>
input:hover{box-shadow: 2px 2px 10px red;}
.err{
 color:red;
 font-size:12px;
 font-weight:bold;
}
 img{
 height:200px;
 width:autopx;
 margin-left:5px;
 margin-right:5px;
 }
input:hover{box-shadow: 2px 2px 10px red;}
.err{
 color:red;
 font-size:12px;
 font-weight:bold;
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
 #t1{
 background-color: aliceblue;
 border-top-color: steelblue;
 border-collapse: collapse;

 }
 body{
background-image: url("6.jpg");
 }
 </style>
 <script type="text/javascript">
 function validation()
 {
 var username=document.getElementById("usname").value;
 if(username=="")
 {
 document.getElementById("uerr").innerHTML="Username Should not be Empty";
 return false;
 }
 if (username.length<8)
 {
 document.getElementById("uerr").innerHTML="Username Should be Minimum 8
characters";
 return false;
 }
 var pass=document.getElementById("pass").value;
 var cpass=document.getElementById("cpass").value;
 if(pass=="")
 {
 document.getElementById("perr").innerHTML="Password Should not be Empty";
 return false;
 }
 if(cpass=="")
 {
 document.getElementById("perr").innerHTML="Confirm Password Should not be
Empty";
 return false;
 }
 if(pass!=cpass)
 {
 document.getElementById("perr").innerHTML="Passwords don't match";
 return false;
 }
 var email=document.getElementById("email").value;
 if(email=="")
 {
 document.getElementById("emerr").innerHTML="E-Mail field should not be
empty";
 return false;
 }
 var male=document.getElementById("male").checked;
 var female=document.getElementById("female").checked;
 if(male==false&&female==false)
 {
 document.getElementById("gerr").innerHTML="Select Gender";
 return false;
 }
 var mobile=document.getElementById("mno").value;
 if(mobile=="")
 {
 document.getElementById("merr").innerHTML="Mobile No. should not be empty";
 return false;
 }
 if(mobile.length<10||mobile.length>10)
 {
 document.getElementById("merr").innerHTML="Mobile No. must contain 10
digits";
 return false;
 }
 var a=document.getElementById("add").value;
 if(a=="")
 {
 document.getElementById("adrr").innerHTML="Address should not be empty";
 return false;
 }
 return true;
 }

 </script>
</head>
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
<form id="form1" onsubmit="return validation()" method="post" action="<?php echo
$_SERVER['PHP_SELF'];?>">
 <fieldset style="display: inline-flex; background-color:aliceblue;"><legend><font
size="+2"><strong>Registration</strong></font></legend>
<table id="t1">
<tr>
 <td>
 <label for="usname">Username</label>
 </td>
 <td>
 <input type="text" name="username" id="usname">
 </td>
 <td id="uerr" class="err">
 </td>
 </tr>
 <tr>
 <td>
 <label for="pass">Password</label>
 </td>
 <td>
 <input type="Password" name="pass" id="pass">
 </td>
 <td rowspan="2" id="perr" class="err">

 </td>
 </tr>
 <tr>
 <td>
 <label for="cpass">Confirm Password</label>
 </td>
 <td>
 <input type="Password" name="cpass" id="cpass">
 </td>
 <td>
 </td>
 </tr>
 <tr>
 <td>
 <label for="email">E-mail</label>
 </td>
 <td>
 <input type="text" name="Email" id="email">
 </td>
 <td id="emerr" class="err">
 </td>
 </tr>
 <tr>
 <td>
 <label for="gender">Gender</label>
 </td>
 <td>
 <input type="radio" name="gender" id="male" value="male">Male<br>
 <input type="radio" name="gender" id="female" value="female">Female
 </td>
 <td id="gerr" class="err">
 </td>
 </tr>
 <tr>
 <td>
 <label for="mno">Mobile No.</label>
 </td>
 <td>
 <input type="text" name="mobile" id="mno">
 </td>
 <td id="merr" class="err">
 </td>
 </tr>
 <tr>
 <td>
 <label for="add">Address</label>
 </td>
 <td>
 <input type="text" name="address" id="add"> 
 </td>
 <td id="adrr" class="err">
 </td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type="Submit" name="submit" value="Submit">
 </td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type="reset" value="Reset">
 </td>
 </tr>
 </table></fieldset></form></div></body></html>
<?php
include('encdec.php');
if (isset($_POST['submit']))
{
$Username=$_POST['username'];
$Password=$_POST['pass'];
 $Password= encrypt($Password,$key);
$Email=$_POST['Email'];
$Gender=$_POST['gender'];
$Mobile_no=$_POST['mobile'];
$Address=$_POST['address'];


include 'dbconn.php';

$sql="insert into registration
values('$Username','$Password','$Email','$Gender','$Mobile_no','$Address')";
 $reg=mysqli_query($con,$sql);
 if($reg == true)
 echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
else{
 echo '<script>alert("Registration Unsuccessful, try again!")</script>';
}
}
?>