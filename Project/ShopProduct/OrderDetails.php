<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry="select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where p.shop_id='".$_SESSION["kid"]."' and b.booking_status!='0' and c.cart_status!='0'";
$res=$Conn->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($Conn->query($upQry))
		{
			?>
            <script>
				window.location="OrderDetails.php";
			</script>
            <?php
		}
	}
	?>
    
            	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>

<?php
if($res->num_rows>0)
{
	?>
	<h1 >Order Details</h1>

<table  border="1">
  <tr>
	<td>SlNo</td>
	<td>Name</td>
	<td>Photo</td>
	<td>Quantity</td>
	<td>Price</td>
	<td>Total Amount</td>
	<td>Action</td>
  </tr>
  <?php 
  $i=0;
  while($row=$res->fetch_assoc())
  {
	  $quantity=$row["cart_quantity"];
	  $price=$row["product_price"];
	  $totalamount=$quantity*$price;
	  $i++;
	  ?>
	  <tr>
		  <td><?php echo $i;?></td> 
		  <td><?php echo $row["product_name"];?></td> 
		  <td><img src="../Assets/Files/Photo/<?php echo $row["product_photo"];?>" width="47" /></td>
		  <td><?php echo $row["cart_quantity"];?></td>
		  <td><?php echo $row["product_price"];?></td>
		  <td><?php echo $totalamount;?></td>
		  <td>
			  <?php  if($row["booking_status"]==2 && $row["cart_status"]==1)
				  {
					  
					  ?>
					  payment completed /
					  <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=2">Pack product</a>
					  <?php 
				  }
				  else if($row["booking_status"]==2 && $row["cart_status"]==2)
				  {
					  ?>
					  product packed /
					  <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=3">Ship Product</a>
					  <?php 
				  }
				  else if($row["booking_status"]==2 && $row["cart_status"]==3)
				  {
					  ?>
					  product shipped /
					  <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=4">Product Delivered</a>
					  <?php 
				  }
				  else if($row["booking_status"]==2 && $row["cart_status"]==4)
				  {
					  ?>
					 Order Completed/
					 <a href="bill.php?id=<?php echo $row["cart_id"]; ?>">Bill</a>
					  <?php 
				  }
				  ?>
				  </td>
				  
			  
	 </tr>
<?php
  }
  ?>
</table>
	<?php

}
else
{
	echo "<h1>No Orders Found</h1>";
}

?>
</body>
<?php 
include("Foot.php");
ob_flush();
?>
</html>