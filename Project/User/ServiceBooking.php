<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
	
	$selQry="select * from tbl_servicebooking sb inner join tbl_service s on s.service_id=sb.service_id inner join tbl_user u on u.user_id=sb.user_id inner join tbl_district d on d.district_id=sb.district_id inner join tbl_shop sh on sh.shop_id=s.shop_id where u.user_id='".$_SESSION["uid"]."'"; 
	$res=$Conn->query($selQry);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<table border="1">
  <tr>
    <td>SlNo</td>
    <td>Service</td>
    <td>Shop</td>
    <td>Date</td>
    <td>Status</td>
  </tr>
      <?php
	  $i=0;
	if($res->num_rows>0)
    {
        while($row=$res->fetch_assoc())
        {
            $i++;
            
        ?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row["service_name"];?></td>
            <td><?php echo $row["shop_name"];?></td>
            <td><?php echo $row["servicebooking_date"];?></td>
            <td>
                <?php
                    if($row["servicebooking_status"]==1)
                    {
                        echo "Service Booked";
                    }
                    else if($row["servicebooking_status"]==2)
                    {
                        echo "Service Confirmed";
                    }
                    else if($row["servicebooking_status"]==3)
                    {
                        echo "Service Rejected";
                    }
                    else if($row["servicebooking_status"]==4)
                    {
                        echo "Completed";
                    }
                ?>
                
            </td>
        <?php
        }
	
    }
    else{
        echo "<h1>No Bookings Found</h1>";
    }
	
	?>
    
</table>

</form>
	</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>