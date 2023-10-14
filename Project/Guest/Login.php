
<?php
session_start();

include("../Assets/Connection/Connection.php");

if(isset($_POST["btnlogin"]))
{
	$email = $_POST["txtemail"];
	$password = $_POST["txtpassword"];
	
	$selQry = "select * from tbl_user where user_email ='".$email."' and user_password='".$password."'";
	$result = $Conn->query($selQry);
	
	
	$selQry1 = "select * from tbl_shop s inner join tbl_type t on t.type_id=s.type_id where shop_email ='".$email."' and shop_password='".$password."' and shop_status='1'";
	$result1 = $Conn->query($selQry1);
	
	
	$selQry2 = "select * from tbl_admin where admin_email ='".$email."' and admin_password='".$password."'";
	$result2 = $Conn->query($selQry2);
	
	
	if($row=$result->fetch_assoc())
	{
		$_SESSION["uid"]=$row["user_id"];
		$_SESSION["uname"]=$row["user_name"];
		header("Location:../User/HomePage.php");
	}
	
	else if($row1=$result1->fetch_assoc())
	{
		$_SESSION["kid"]=$row1["shop_id"];
		$_SESSION["kname"]=$row1["shop_name"];
		if($row1["type_name"]=="Product")
		{
			header("Location:../ShopProduct/HomePage.php");
		}
		else{
			header("Location:../ShopService/HomePage.php");
		}
	}
	
	else if($row2=$result2->fetch_assoc())
	{
		$_SESSION["aid"]=$row2["admin_id"];
		$_SESSION["aname"]=$row2["admin_name"];
		header("Location:../Admin/HomePage.php");
	}
	
	else
	{
		echo "<script>alert('Invalid Credentials!!!')</script>";
	}
}
include("Head.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<div class="container">
  <h2>Login</h2>
  <form method="POST">
  <table style="width:30%;" class="table table-light">
  <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" autocomplete="off" required/></td>
    </tr>
  <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnlogin" id="btnlogin" value="Login" />
      </div></td>
    </tr>
  </table>
  </form>

</body>
</div>
</html>
<?php
ob_flush();
include("Foot.php");
?>