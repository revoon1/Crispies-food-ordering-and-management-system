<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'logindb');
echo $id=$_GET['id'];
$query="select * from product where id='$id'";
$run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){
    $id=$row['id'];
	$name=$row['fname'];  
	$image=$row['fimage'];
	$price=$row['fprice'];
	$type=$row['ftype'];
    $description=$row['fdescription'];
    $query="insert into cart(email,cname,cimage,cprice,ctype,cdescription) VALUES ('$_SESSION[user]','$name','$image','$price','$type','$description')";
    if(mysqli_query($con,$query))
    {
        header("location:homy.php?mes=Product Added Successfully");
    }
    else{
        header("location:homy.php?mes=Problem In Adding");
    }
}
?>