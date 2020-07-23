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
    <link rel="stylesheet" type="text/css" href="css\allproduct.css?version=2">
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
<div class="box"><h1 class="heading">PRODUCTS</h1></div>
<?php
$query="select * from product";
$run=mysqli_query($con,$query);
?>
<table>
<tr></tr>
<?php
while($row=mysqli_fetch_array($run))
{
    ?>
    <tr><form action='dbconfig/update.php' method=post enctype='multipart/form-data'>
    <td><input type=checkbox name=check value='<?php echo $row['id'] ?>'>Remove</td>
    <td><input type= text name=nm value='<?php echo $row['fname'];?>'></td>
    <td><input type= text name=pr value='<?php echo $row['fprice'];?>'></td>
    <td><img class=cartimg src='images/<?php echo $row['fimage'];?>'><br><input type=file name=imge></td>
    <td><input type= text name=de value='<?php echo $row['fdescription'];?>'></td>
    <input type= hidden name=id value='<?php echo $row['id'];?>'>
    <td><input type=submit name=submit value='Update'><td>
    </form></tr>
    <?php
}
?>
</table>
</div>
</body>
</html>