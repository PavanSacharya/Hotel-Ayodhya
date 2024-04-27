<?php
session_start();
error_reporting(0);
include("sqlcon.php");

if(isset($_POST['submit']))
{
	if(isset($_SESSION["utype"]))
	{
		if($_SESSION["utype"] == "seller")
		{
			 $rs = mysqli_query($con,"update seller set seller_password='".$_POST['Pass']."' where seller_id=".$_SESSION["uid"]);
				if($rs)
				{
					echo "<script>alert('Password Updated!!');</script>";
				} 
		}
		else if($_SESSION["utype"] == "admin")
		{
			 $rs1 = mysqli_query($con,"update admin set u_pass='".$_POST['Pass']."' where admin_id=".$_SESSION["uid"]);
				if($rs1)
				{
					echo "<script>alert('Password Updated!!');</script>";
				}
		}
		else if($_SESSION["utype"] == "user")
		{
			 $rs2 = mysqli_query($con,"update user set password='".$_POST['Pass']."' where user_id=".$_SESSION["uid"]);
				if($rs2)
				{
					echo "<script>alert('Password Updated!!');</script>";
				}
		}
		else if($_SESSION["utype"] == "employee")
		{
			 $rs3 = mysqli_query($con,"update employee set password='".$_POST['Pass']."' where empid=".$_SESSION["uid"]);
				if($rs3)
				{
					echo "<script>alert('Password Updated!!');</script>";
				}
		}
	}
	else
	{
		echo "<script>alert('Please login !!');window.location='index.php';</script>";
	}
}


?>  
   
   
<?php
include("header.php")
?>

 

<div class="content">
				<!--login-->
			<div class="login">
		        <div class="main-agileits">
				    <div class="form-w3agile form1">
						<h3>Reset Password</h3>
						
    <form class="form-horizontal" action="" method="post">
   
	    <div class="form-group">
        <label for="inputEmail3">New Password</label>
          <input type="Password" class="form-control" id="Pass" name="Pass" placeholder="Password" required pattern="[a-zA-Z0-9]{6,16}" title="please enter only character or numbers between 6 to 16 for password" >
      </div>
	    <div class="form-group">
        <label for="inputEmail3">Confirm Password</label>
       
          <input type="Password" class="form-control" id="Cpass" name="Cpass" placeholder="Confirm Password" required pattern="[a-zA-Z0-9]{6,16}" title="please enter only character or numbers between 6 to 16 for password"  >
       
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-primary" name="submit" value="UPDATE" onclick="return Validate()">
		       <input type="reset" class="btn btn-primary" name="cancel" value="CANCEL">
        </div>
      </div>
    </form>
  </div>
			    </div>
		    </div>
				<!--login-->
		</div>
		<!--content-->
		<!---footer--->
			<?php 
			include("footer.php");
			?>
</body>
</html>

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("Pass").value;
        var confirmPassword = document.getElementById("Cpass").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
 
