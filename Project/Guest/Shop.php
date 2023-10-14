<?php
ob_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$email=$_POST["txtemail"];
	$address=$_POST["txtaddress"];
	$place_id=$_POST["sel_place"];
    
  $password=$_POST["txtpassword"];
  $type=$_POST["sel_type"];
	
	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Photo/".$photo);
	
	$proof=$_FILES["fileproof"]["name"];
	$path=$_FILES["fileproof"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Proof/".$proof);
	
	$insQry="insert into tbl_shop(shop_name,shop_contact,shop_address,shop_email,place_id,shop_photo,shop_proof,shop_password,shop_doj,type_id)values('".$name."','".$contact."','".$address."','".$email."','".$place_id."','".$photo."','".$proof."','".$password."',curdate(),'".$type."')";

		if($Conn->query ($insQry))
			{
				?>
        <script>
              alert('Inserted');
              location.href='Shop.php';
				</script>
				<?php
			}
		    else
			{
				 ?>
				 <script>
				    alert('Failed');
			   	 location.href='Shop.php';
				 </script>
                 <?php
			}
}
include("Head.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Shop</title>
</head>


<div id="tab" align="center" class="container p-3">
  <h2>Shop Registration</h2>
<form  method="post" enctype="multipart/form-data" name="form1" id="form1" class="needs-validation" novalidate>
  <table  class="table table-light">
    <tr>
      <td width="153">Name</td>
      <td width="332"><label for="txtname"></label>
      <input autocomplete="off" type="text" name="txtname" id="txtname"  required class="form-control" />
      <div class="invalid-feedback">Please Enter a valid name</div>
    </td>
      
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input class="form-control" type="text" name="txtcontact"  id="txtcontact" pattern="[+0-9]{10,13}" autocomplete="off" required/>
      <div class="invalid-feedback">Please Enter a valid Contact number</div>
    </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea class="form-control" style="width:100%;" name="txtaddress" id="txtaddress"cols="45" rows="5" autocomplete="off" required></textarea>
      <div class="invalid-feedback">Please Enter a valid address</div>
    </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input class="form-control"  type="email" name="txtemail" id="txtemail" autocomplete="off" required/>
      <div class="invalid-feedback">Please Enter a valid email</div>
    </td>
    </tr>
    <tr>
      <td>Type</td>
     <td >
        Are You Selling 
        <?php
	  $districtQry="select * from tbl_type";
	  $res=$Conn->Query($districtQry);
	  while($row=$res->fetch_assoc())
	  {
	?>
    <input required type="radio" name="sel_type" value="<?php echo $row["type_id"] ?>"/><?php echo $row["type_name"] ?> 
    <?php
	  }?>
    
      </td>
  </tr>
    <tr>
      <td>District</td>
     <td><label for="sel_district"></label>
      <label for="sel_district"></label>
        <select class="form-control" name="sel_district" id="sel_district" onChange="getPlace(this.value)" required>
        <option value="">---select---</option>
       
        <?php
	  $districtQry="select * from tbl_district";
	  $res=$Conn->Query($districtQry);
	  while($row=$res->fetch_assoc())
	  {
	?>
    <option value=<?php echo $row["district_id"]; ?> > <?php echo $row["district_name"]; ?>
    </option>
    <?php
	  }?>
      </select>
      <div class="invalid-feedback">Pleaase Fill this field</div>
      </td>
  </tr>
    <tr>
     <td>Place</td>
      <td><label for="sel_place"></label>
      <label for="sel_place"></label>
        <select class="form-control"  name="sel_place" id="sel_place" required>
        <option value="">---select---</option>
       
      </select>
      <div class="invalid-feedback">Please fill this field</div>
    </td>
    </tr>
    <tr>
        
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input required class="form-control" type="file" name="filephoto" id="filephoto" />
      <div class="invalid-feedback">Please Choose a file</div>
    </td>
     
    </tr>

    <tr>
      <td>Proof</td>
      <td><label for="fileproof"></label>
      <input class="form-control" type="file" name="fileproof" id="fileproof" required /><label for="txtproof" ></label>
      <div class="invalid-feedback">Please Choose a file</div>
    </td>
      
    </tr>

    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input class="form-control" type="password" name="txtpassword" id="txtpassword"  autocomplete="off" required/>
      <div class="invalid-feedback">Please enter a valid password</div>
    </td>
      
    </tr>

   <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
   
 	function getPlace(did)
	{

		$.ajax({url:"../Assets/AjaxPages/AjaxPlace.php?did="+ did,
		success:function(result)
		{
			$("#sel_place").html(result);
		}});
	}

  document.addEventListener("DOMContentLoaded",function(){
    let form = document.querySelector(".needs-validation")
    form.addEventListener("submit",function(e){
      if(!form.checkValidity())
      {
        e.preventDefault();
        e.stopPropagation();
        
      }
      form.classList.add("was-validated");
    
    })
  })
	
  
	</script>
    <?php 
	include("Foot.php");
	ob_flush();
	?>
</html>