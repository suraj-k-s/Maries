<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txt_date"];
	$details=$_POST["txtdetails"];
	$district=$_POST["sel_district"];
	
	
		
	$insQry ="INSERT INTO `tbl_servicebooking`(`user_id`, `service_id`, `servicebooking_details`, `district_id`, `servicebooking_date`, `servicebooked_date`)
     VALUES ('".$_SESSION["uid"]."','".$_GET["sid"]."','$details','$district','$name',curdate())";
	if($Conn->query($insQry))
    {
        $selC = "select max(servicebooking_id) as booking_id from tbl_servicebooking where user_id=" .$_SESSION["uid"];
        $rs = $Conn->query($selC);
        $row=$rs->fetch_assoc();
    	?>
   		<script>
		alert('Booked');
		location.href='PaymentService.php?bid=<?php echo $row["booking_id"]?>';
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
<h1 align="center">Service Booking</h1>
  <table  border="1" align="center">
    <tr>
      <td > Date</td>
      <td ><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td> Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails"cols="45" rows="5" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td> District</td>
      <td>
      <select name="sel_district" id="sel_district" autocomplete="off" required>
          <option value="">---select---</option>
          <?php
	  $districtQry="select * from tbl_district";
	  $res=$Conn->Query($districtQry);
	  while($row=$res->fetch_assoc())
	  {
	?>
          <option value=<?php echo $row["district_id"]; ?> > <?php echo $row["district_name"]; ?> </option>
          <?php
	  }?>
        </select>
    </td>
    </tr>
    <tr>  
    <td align="center"colspan="2"><input type="submit" name="btnsave" id="btnsave" value="submit" /></td>
    </tr>
  </table>
  </form>
  </div>
</body>

  <?php
include("Foot.php");
ob_flush();
?>
</html>