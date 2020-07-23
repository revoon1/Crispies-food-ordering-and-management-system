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
    <link rel="stylesheet" type="text/css" href="css\admin.css?version=2">
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
<div style="overflow-x:auto;width:40%;margin:auto;">
<form action="admin.php" method="post">

<table>
<caption><h1>ADD CATEGORY</h1></caption>
<tr>
<th>CATEGORY NAME</th>
</tr>
<tr>
<td><input type="text" placeholder="Enter Category Name" name="cat" /></td>
</tr>

</table>
<button class="btn" type="submit" name="casubmit" >ADD</button>
</form>
<?php
if(isset($_POST['casubmit']))
{
    $cate=$_POST['cat'];
    
    $query="insert into pcategory (ptype) VALUES('$cate')";
    if(mysqli_query($con, $query))
    {
        echo "Category Added";
    }
    else{
        echo "Failed to add category";
    }
}
?>
</div>

<div style="overflow-x:auto;width:90%;margin:auto;">
<form action="admin.php" method="post" enctype="multipart/form-data">

<table>
<caption><h1>ADD ITEMS</h1></caption>
<tr>
<th>ITEM NAME</th>
<th>ITEM IMAGE</th>
<th>ITEM PRICE</th>
<th>ITEM DESCRIPTION</th>
<th>ITEM CATEGORY</th>
</tr>
<tr>
<td><input type="text" placeholder="Enter Item Name" name="name" /></td>
<td><input type="file" name="image" id="file" /><label class=labe for="file">Click to Choose a file</label></td>
<td><input type="text" placeholder="Enter Item Price" name="price" /></td>
<td><input type="text" placeholder="Enter Item Description" name="des" /></td>

<td>
<label for="typ"> Choose Category:</label>
<?php
$query=mysqli_query($con,"select * from pcategory");
$rowcount=mysqli_num_rows($query);

?>
<select name="type" id="typ">
<option value="">Select One</option>
<?php
for($i=1;$i<=$rowcount;$i++){
    $row=mysqli_fetch_array($query);

?>
<option value="<?php echo $row["ptype"] ?>"><?php echo $row["ptype"] ?></option>

<?php
}
?>
</select>
</td>
</tr>

</table>
<button class="btn" type="submit" name="submit" >ADD</button>
</form>

<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['des'];
    $type=$_POST['type'];
    $image=$_FILES['image']['name'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"images/$image");
    $query="insert into product (fname,fimage,fprice,ftype,fdescription) VALUES('$name','$image','$price','$type','$description')";
    if(mysqli_query($con, $query))
    {
        echo "Product sucessfully Inserted";
    }
    else{
        echo "Product failed to Insert";
    }
}
?>
</div>
</body>
</html>