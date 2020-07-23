<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,"logindb");
session_start();
if(!isset($_SESSION['admin'])){
    header('location:../../crispies/signin.php');
}
if(isset($_POST['submit']))
{   
    
    if(isset($_POST['check']))
    {
    $query="delete from product where id='$_POST[check]'";
    if(mysqli_query($con,$query))
    {
        header("location:../../crispies/allproduct.php?mes=Item deleted");
    }
    else{
        header("location:../../crispies/allproduct.php?mes=Item failed to deleted");

    }
}
if(isset($_POST['submit']))
{   
    if($_FILES['imge']['name']!="")
    {
        $image=$_FILES['imge']['name'];
        $image_tmp_name=$_FILES['imge']['tmp_name'];
        move_uploaded_file($image_tmp_name,"images/$image");
        
    }
    else
    {
        $query="select * from product where id='$_POST[id]'";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
        {
            $image=$row['fimage'];
        }
    }
}
$query="update product set fname='$_POST[nm]',fimage='$image',fprice='$_POST[pr]',fdescription='$_POST[de]' where id='$_POST[id]'";
if(mysqli_query($con,$query))
{
    header ('location:../../crispies/allproduct.php');
}
}

?>