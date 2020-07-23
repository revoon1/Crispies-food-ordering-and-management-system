<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,"logindb");
session_start();
if(!isset($_SESSION['admin'])){
    header('location:../../crispies/signin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    
	<title>Crispies Administrator</title>
    <link rel="stylesheet" type="text/css" href="css\allproduct.css">
</head>
<body>
<div class="header">
<div class="haeder-left"><img src="images/logoo.png" class="logoo" alt="Crispies"></div>
    <div class="header-right">
    <a href="allproduct.php">Products</a>
    <a href="categories.php">Categories</a>
    <a href="adminorders.php">Orders</a>
    <a href="admin.php">Add Product</a>
    <a href="dbconfig/logout.php">Logout</a>
    </div>
</div>
<div class="box2">
<div class="box"><h1 class="heading">CATEGORIES</h1></div>
<form action="categories.php" method="post" enctype="multipart/form-data">
<table>
<?php
$query="select * from pcategory";
$run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run))
{
    $pid=$row['pid'];
    $ptype=$row['ptype'];

    ?>
    <tr><td><input type="checkbox" name="check[]" value="<?php echo $pid ;?>" multiple/>Remove</td>
    <td><input type="hidden" name="id[]" value="<?php echo $pid;?>"><input type="text" name="ty[]" value="<?php echo $ptype;?>" size="20"/></td></tr>
<?php
}
?>
</table>
<input type="submit" name="submit" value="Update">
</form>
</div>
<?php
if(isset($_POST['submit']))
{
    if(isset($_POST['ty']))
    {
        $quaty=$_POST['ty'];
        $ids=$_POST['id'];
        $array=array_combine($quaty,$ids);
        foreach($array as $q=>$i)
        {
            $query="update pcategory set ptype='$q' where pid='$i' ";
            mysqli_query($con,$query);
            header("location:categories.php?mes=Update Successfully");
            
        }
    }   
}

?>
<?php
if(isset($_POST['submit']))
{
    if(isset($_POST['check']))
    {
        $dele=$_POST['check'];
        foreach($dele as $del)
        {
            $query="delete from pcategory where id='$del'";
            if(mysqli_query($con,$query))
            {
                header("location:categories.php?mes=Item deleted");
            }
            else{
                header("location:categories.php?mes=Item failed to deleted");

            }
        }
    }
}

?>
</body>
</html>