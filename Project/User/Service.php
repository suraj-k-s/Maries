<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
$name = "";
	
		$selQry="select * from tbl_service s inner join tbl_shop sh on sh.shop_id=s.shop_id inner join tbl_place p on p.place_id=sh.place_id inner join tbl_district d on d.district_id=p.district_id where true"; 
            if(isset($_POST["btn_search"]))
            {
                $name = $_POST["txt_name"];
                $selQry = $selQry ." and service_name LIKE '$name%'";
            }

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
        <form method="post">
        <input type="text" style="width:220px" name="txt_name" value="<?php echo $name ?>" placeholder="Enter Service Name"/>
        <input type="submit" name="btn_search" style="width:120px" value="search"/>
        </form>
    <br><br><br>
	<div id="tab" align="center" >
        <?php

if($res->num_rows>0)
{
?>
   
    <table border="1">
        <tr>
      <?php
	  $i=0;
	while($row=$res->fetch_assoc())
	{
        $i++;
		?>
            <td>
                    <table border="1">
                        <tr>
                            <td colspan="2" align="center">
                                <img src="../Assets/Files/Photo/<?php echo $row["service_photo"] ?>" height="120" width="120"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <?php echo $row["service_name"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Price
                            </td>
                            <td>
                                <?php echo $row["service_price"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Shop
                            </td>
                            <td>
                                <?php echo $row["shop_name"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                District
                            </td>
                            <td>
                                <?php echo $row["district_name"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Place
                            </td>
                            <td>
                                <?php echo $row["place_name"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Details
                            </td>
                            <td>
                                <?php echo $row["service_details"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <a href="Book.php?sid=<?php echo $row["service_id"] ?>">Book Now</a>
                            </td>
                        </tr>
                    </table>
            </td>
        <?php
        if($i==3)
        {
            echo "</tr><tr>";
            $i=0;
        }
	}
	}
    else
   {
	   echo "<h1 align='center'>No Data Found<h1>";
   }
	
	?>
    
</table>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>