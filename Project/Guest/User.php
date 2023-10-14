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
    $gender=$_POST["gender"];
	$dob=$_POST["txtdob"];
	
	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Photo/".$photo);
	
	$proof=$_FILES["fileproof"]["name"];
	$path=$_FILES["fileproof"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Proof/".$proof);
	
	$insQry="insert into tbl_user(user_name,user_contact,user_address,user_email,place_id,user_photo,user_proof,user_password,user_gender,user_dob)values('".$name."','".$contact."','".$address."','".$email."','".$place_id."','".$photo."','".$proof."','".$password."','".$gender."','".$dob."')";
	//echo $insQry;	
  if($Conn->query ($insQry))
			{
				?>
                <script>
				alert('inserted');
				location.href='User.php';
				</script>
				<?php
			}
		    else
			{
				 ?>
				 <script>
				 alert('failed');
			   	 location.href='User.php';
				 </script>
                 <?php
			}
}
include("Head.php");

$Y = date('Y')-18;
$M = date('m');
$D = date('d');
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::User</title>
</head>

<body>
<div class="container">
  <h2>User Registration</h2>
  <form  method="post" enctype="multipart/form-data" name="form1" id="form1" class="needs-validation" novalidate>
  <table class="table table-light">
    <tr>
      <td width="119">Name</td>
      <td width="65">
        <div class="mb-3">
          <input type="text" class="form-control" name="txtname" id="txtname" autocomplete="off" required />
          <div class="invalid-feedback">Please enter valid name</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <div class="mb-3">
          <input type="text" class="form-control" name="txtcontact" id="txtcontact" pattern="[+0-9]{10,13}" autocomplete="off" required />
          <div class="invalid-feedback">Please enter valid contact number</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="btnmale" value="male" autocomplete="off" required />
            <label class="form-check-label" for="btnmale">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="btnfemale" value="female" autocomplete="off" required />
            <label class="form-check-label" for="btnfemale">Female</label>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <div class="mb-3">
          <input type="email" class="form-control" name="txtemail" id="txtemail" autocomplete="off" required />
          <div class="invalid-feedback">Please enter valid email</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Dob</td>
      <td>
        <div class="mb-3">
          <input type="date" class="form-control" name="txtdob" id="txtdob" max="<?php echo $Y."-".$M."-".$D; ?>" autocomplete="off" required />
          <div class="invalid-feedback">Please enter valid DOB</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td>
        <div class="mb-3">
          <textarea class="form-control" style="width:100%;" name="txtaddress" id="txtaddress" cols="45" rows="5" autocomplete="off" required></textarea>
          <div class="invalid-feedback">Please enter valid Address</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Photo</td>
      <td>
        <div class="mb-3">
          <input type="file" class="form-control" name="filephoto" id="filephoto" autocomplete="off" required />
          <div class="invalid-feedback"> Pleaase Fill this field</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Proof</td>
      <td>
        <div class="mb-3">
          <input type="file" class="form-control" name="fileproof" id="fileproof" autocomplete="off" required />
          <div class="invalid-feedback"> Pleaase Fill this field</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>District</td>
      <td>
        <div class="mb-3">
          <select class="form-select" name="sel_district" id="sel_district" onchange="getPlace(this.value)" autocomplete="off" required>
            <option value="">---select---</option>
            <?php
              $districtQry="select * from tbl_district";
              $res=$Conn->Query($districtQry);
              while($row=$res->fetch_assoc())
              {
            ?>
            <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
            <?php
              }?>
          </select>
          <div class="invalid-feedback"> Pleaase Fill this field</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td>
        <div class="mb-3">
          <select class="form-select" name="sel_place" id="sel_place" autocomplete="off" required>
            <option value="">---select---</option>
          </select>
          <div class="invalid-feedback"> Pleaase Fill this field</div>
        </div>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <div class="mb-3">
          <input type="password" class="form-control" name="txtpassword" id="txtpassword2" autocomplete="off" required />
          <div class="invalid-feedback"> Pleaase Fill this field</div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center">
          <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Submit</button>
        </div>
      </td>
    </tr>
  </table>
</form>
</div>
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