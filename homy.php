<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'logindb');
session_start();
if(!isset($_SESSION['user'])){
	header('location:../../crispies/signin.php');
}
$query="select * from cart where email='$_SESSION[user]'";
$run=mysqli_query($con,$query);
$total=mysqli_num_rows($run);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crispies Home</title>
    <link rel="stylesheet" type="text/css" href="css\homy.css?version=6">
</head>
	
<body>
<div class="header">
	<div class="haeder-left"><img src="images/logoo.png" class="logoo" alt="Crispies"></div>
    <div class="header-right">
    <form action="homy.php" method="post">
    <a  href="cart.php">Cart (<?php echo $total; ?>)</a>
    <a href="dbconfig/logout.php">Logout</a>
    </form>
    </div>
</div>
<div class="box"><h1 class="heading">MENU</h1></div>
<div class="box2">
<?php
$query1="select * from pcategory";
$run1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($run1)){
	$cat=$row['ptype'];
	?>
	<h1 class="heading"><?php echo $cat; ?></h1>
<?php
$query="select * from product where ftype='$cat'";
$run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run))
{
	$id=$row['id'];
	$name=$row['fname'];  
	$image=$row['fimage'];
	$price=$row['fprice'];
	$type=$row['ftype'];
	$description=$row['fdescription'];
	?>

<div class="card">
  <img src="images/<?php echo $image; ?>" style="width:100%" />
  <h2><?php echo $name; ?></h2>
  <p class="price">Rs <?php echo $price; ?></p>
  <p><?php echo $description; ?></p>
  <p><a href="process.php?id=<?php echo $id; ?>"><button name="cart">Add to cart</button></a></p>
</div>
<?php
}
}
?>

</div>
</body>
</html>