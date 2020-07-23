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
    <link rel="stylesheet" type="text/css" href="css\adminorders.css?version=2">
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
<div class="box"><h1 class="heading">ORDERS</h1></div>
<div class="box2">
    <?php
    $query="select distinct email from orders";
    $run=mysqli_query($con,$query);

    while($row=mysqli_fetch_array($run)){
    $email=$row['email'];
    $total=0;
    ?>
    <table>
        <tr><th>NAME: <?php echo $email; ?></th></tr>
        <tr><th>Phone Number</th><th>Address</th><th>Order ID</th><th>Product Name</th><th>Product Image</th><th>Price</th><th>Quantity</th><th>Quantity Price</th></tr>
    <?php
    $query1="select * from orders where email='$email'";
    $run1=mysqli_query($con,$query1);
    while($row=mysqli_fetch_array($run1)){
        $pnum=$row['ophonenum'];
        $addr=$row['oaddress'];
        $id=$row['id'];
        $name=$row['oname'];  
        $image=$row['oimage'];
        $price=$row['oprice'];
        $quantity=$row['oquantity']; 
        $qprice=$row['ototalprice'];
        $total=$total+$row['oprice']*$quantity;                
    ?>
    
    <tr><td><?php echo $pnum; ?></td><td><?php echo $addr; ?></td><td><?php echo $id; ?></td><td><?php echo $name; ?></td><td><img class="cartimg" src="images/<?php echo $image ?>" /></td>
    <td>Rs <?php echo $price; ?></td><td><?php echo $quantity; ?></td><td>Rs <?php echo $qprice; ?></td></tr>
    
    <?php
    }
    ?>
    <tr><th>Total Price: Rs <?php echo $total; ?></th></tr>
    <?php
}
    ?>
    
    </table>
</div>
</body>
</html>