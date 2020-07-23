<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'logindb');
$username=$_POST['uname'];
$email=$_POST['email'];
$password=$_POST['psw'];
$cpassword=$_POST['cpsw'];
$s="select * from user where email='$email'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script type="text/javascript">alert("Email Already Exist");location="../../crispies/signin.php";</script>';
}
else{
    if($password==$cpassword){
        $reg="insert into user(username,email,password) values('$username','$email','$password')";
        mysqli_query($con,$reg);
        echo '<script type="text/javascript">alert("Registration successful");location="../../crispies/signin.php";</script>';
    }
    else
    {
        echo '<script type="text/javascript">alert("Confirm password not match with password");location="../../crispies/signin.php";</script>';
        
    }
    
}
?>