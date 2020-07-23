<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'logindb');
if(!isset($_SESSION['user'])){
	header('location:../../crispies/signin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Placed</title>
    <link rel="stylesheet" type="text/css" href="css\orderplace.css?version=1">
</head>
<body>
<div class="header">
	<div class="haeder-left"><img src="images/logoo.png" class="logoo" alt="Crispies"></div>
    <div class="header-right">
    <form action="homy.php" method="post">
    <a href="dbconfig/logout.php">Logout</a>
    </form>
    </div>    
</div>
<div class=header2>
        <div class=crisptext>
            <h1 style="font-size:50px"><b>ORDER PLACED SUCCESSFULLY<b></h1>
            <form action="homy.php" method="post">
            <a href="homy.php"><button>Continue Shopping</button></a>
            </form>
        </div>
    </div>
</body>
</html>
