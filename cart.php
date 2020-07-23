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
	<title>Crispies Cart</title>
    <link rel="stylesheet" type="text/css" href="css/cart.css?version=3">
</head>
<body>
<div class="header">
	<div class="haeder-left"><img src="images/logoo.png" class="logoo" alt="Crispies"></div>
    <div class="header-right">
    <form action="homy.php" method="post">
    <a href="homy.php">Home</a>
    <a href="dbconfig/logout.php">Logout</a>
    </form>
    </div>    
</div>
<div class="box"><h1 class="heading">CART</h1></div>
<div class="box2">
    <form action="cart.php" method="post" enctype="multipart/form-data">
    <table>
        
    <?php
    $query="select * from cart where email='$_SESSION[user]'";
    $run=mysqli_query($con,$query);
    $ress=mysqli_num_rows($run);
    if($ress==0)
    {
        echo "<p class=echp>YOUR CART IS EMPTY</p>";
    }
    $total=0;
    while($row=mysqli_fetch_array($run))
    {
    $id=$row['id'];
	$name=$row['cname'];  
	$image=$row['cimage'];
    $price=$row['cprice'];
    $quantity=$row['cquantity']; 
    $qprice=$row['cprice']*$quantity;
    $total=$total+$row['cprice']*$quantity;
    ?>
    <tr><td><input type="checkbox" name="check[]" value="<?php echo $id ;?>" multiple/>Remove</td>
    <td><img class="cartimg" src="images/<?php echo $image ?>" /></td>
    <td><?php echo $name;?></td>
    
    <td>Rs <?php echo $price;?></td>
    <td><input type="hidden" name="id[]" value="<?php echo $id;?>"><input type="text" name="qty[]" value="<?php echo $quantity;?>" size="5"/></td>
    <td>Rs <?php echo $qprice;?></td></tr>

    <?php
    }
    ?>
      </table>
      <br>
    <input type="submit" name="submit" value="Update">
    
      </form>
</div>
<?php
if(isset($_POST['submit']))
{
    if(isset($_POST['qty']))
    {
        $quaty=$_POST['qty'];
        $ids=$_POST['id'];
        $array=array_combine($quaty,$ids);
        foreach($array as $q=>$i)
        {
            $query="update cart set cquantity='$q' where id='$i' ";
            mysqli_query($con,$query);
            header("location:cart.php?mes=Update Quantity Successfully");
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
            $query="delete from cart where id='$del'";
            if(mysqli_query($con,$query))
            {
                header("location:cart.php?mes=Item deleted");
            }
            else{
                header("location:cart.php?mes=Item failed to deleted");
            }
        }
    }
}

?>
<div class="box2">
<h3>TOTAL PRICE:- Rs <?php echo $total;?> </h3>
</div>
<div class="box"><h1 class="heading2">DELIVERY DETAILS</h1></div>
<div class="box2">
    <form action="cart.php" method="post" enctype="multipart/form-data">
    <table>
    <tr><th>Phone Number:- <input type="text" name="pnum" size="10" required></th>
    <th>Address:- <input type="text" name="addr" size="100" required></th></tr>
    <tr><td><input type="radio" name="cash" required>Cash on Delivery</td></tr>
    </table>
    <button class="place" type="submit" name="psubmit">Place Order</button>

    <?php
    if(isset($_POST['psubmit']))
    {        
                    $que="select * from cart where email='$_SESSION[user]'";
                    $ru=mysqli_query($con,$que);
                    while($row=mysqli_fetch_array($ru))
                    {
                        $pnum=$_POST['pnum'];
                        $addr=$_POST['addr'];
                        $id=$row['id'];
                        $name=$row['cname'];  
                        $image=$row['cimage'];
                        $price=$row['cprice'];
                        $quantity=$row['cquantity']; 
                        $qprice=$row['cprice']*$quantity;
                        $qu="insert into orders(email,oimage,oname,oprice,oquantity,ototalprice,ophonenum,oaddress) VALUES ('$_SESSION[user]','$image','$name','$price','$quantity','$qprice','$pnum','$addr')";
                        mysqli_query($con,$qu);
                        $q="delete from cart where email='$_SESSION[user]' and id='$id'"; 
                        mysqli_query($con,$q );
                        
                    }
                    header('location:orderplace.php');
               
    }
    ?>
    </form>
</div>

</body>
</html>