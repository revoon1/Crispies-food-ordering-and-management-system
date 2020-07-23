<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'logindb');
$email=$_POST['email'];
$password=$_POST['psw'];
if($email=='admin' && $password=='1234')
{
    $_SESSION['admin']='$email';
    header('location:../../crispies/allproduct.php');
}
$s="select * from user where email='$email'&& password='$password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    $_SESSION['user']=$email;
    header('location:../../crispies/homy.php');
}
else{
    echo '<script type="text/javascript">alert("Incorrect Username or Password");location="../../crispies/signin.php";</script>';
}
?>