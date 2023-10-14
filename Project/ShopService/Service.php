<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$details=$_POST["txtdetails"];
	$price=$_POST["txtprice"];
	
	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Photo/".$photo);
	
		
	$insQry ="insert into tbl_service(service_name,service_photo,service_details,service_price,shop_id) values('".$name."','".$photo."','".$details."','".$price."','".$_SESSION["kid"]."')";
	if($Conn->query($insQry))
    {
    	?>
   		<script>
		alert('inserted');
		location.href='Service.php';
		</script>
		<?php
	}
    else
	{
		 ?>
		 <script>
		 alert('failed');
	   	 location.href='Service.php';
		 </script>
		 <?php
    }
} 
 if(isset($_GET["id"]))
{
    $id=$_GET["id"];	
    $delQry="delete from tbl_service where service_id='".$_GET["id"]."'";
    if($Conn->query($delQry))
	{
	   ?>
        <script>
		alert('deleted!!');
		location.href='Service.php';
		</script>
		<?php
	}
else
	{
		?>
        <script>
		alert('failed!!');
		location.href='Service.php';
		</script>
		<?php
	}
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Service</title>
</head>

<body>
  <br><br><br><br><br>
  <div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<h1 align="center">Service</h1>
  <table  border="1" align="center">
    <tr>
      <td > Service Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td> Service Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required /></td>
    </tr>
    <tr>
      <td> Service Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails"cols="45" rows="5" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td> Service Price</td>
      <td><label for="txtprice"></label>
      <input type="number" name="txtprice" id="txtprice"  autocomplete="off" required/></td>
    </tr>
    <tr>  
    <td align="center"colspan="2"><input type="submit" name="btnsave" id="btnsave" value="submit" /></td>
    </tr>
  </table>
  <?php
  $i=0;
  $selQry="select * from tbl_service where shop_id='".$_SESSION["kid"]."'";
 
  $rel=$Conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table align="center"  border="1">
    <tr>
      <td>Sl no</td>
      <td>Service name</td>
      <td>Price</td>
      <td  align="center">Action</td>
    </tr>
       <?php
	$i=0;
	
	while($row=$rel->fetch_assoc())
	{
		$i++;
?>
   <tr>
	<td><?php echo $i?></td> 
    <td><?php echo $row["service_name"]?></td>
    <td><?php echo $row["service_price"]?></td>
	<td><a href="Service.php?id=<?php echo $row["service_id"];?>">Delete</a></td>
</tr>
<br>
<?php
	}
   }
   else
   {
	   echo "<h1 align='center'>No Data Found<h1>";
   }

?>   
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
  </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 	function getSubcategory(did)
	{

		$.ajax({url:"../Assets/AjaxPages/AjaxSubcategory.php?did="+ did,
		success:function(result)
		{
			//alert(result)
			$("#sel_subcategory").html(result);
		}});
	}
	</script>
  <?php
include("Foot.php");
ob_flush();
?>
</html>