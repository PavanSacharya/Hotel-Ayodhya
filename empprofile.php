<?php 
include("sqlcon.php");

 if(isset($_POST['update']))
{
	$qry = ("update employee set empname='".$_POST['empname']."',gender='".$_POST['gender']."',contact_no='".$_POST['contact_no']."',address='".$_POST['address']."',emailid='".$_POST['emailid']."',designation='".$_POST['designation']."',salary='".$_POST['salary']."' where empid='".$_GET['id']."'");

	{
		echo "<script>alert('profile updated successfully!!!');window.location='empprofile.php';</script>>";
	}
      

}
if(isset($_GET['id']))
{
	$qry="Select * from employee where empid =".$_GET['id'];
	$rst = mysqli_query($con, $qry);
	$arr = mysqli_fetch_array($rst);
	$empname = $arr[1];
	$gender = $arr[2];
	$emailid = $arr[3];
	$designation=$arr[5];
	$salary=$arr[6];
	$contact_no=$arr[7];
	$address=$arr[9];
}
?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Registered</span></h3>
			</div>
		</div>
	<!--banner-->
	<script>
function fillemployee(empid)
{
	if(window.XMLHttpRequest)
	{
		xmlhttp= new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//alert(xmlhttp.responseText);
			document.getElementById("gender").value=xmlhttp.responseText;
			document.getElementById("emailid").value=xmlhttp.responseText;
			document.getElementById("address").value=xmlhttp.responseText;
			document.getElementById("designation").value=xmlhttp.responseText;
			document.getElementById("salary").value=xmlhttp.responseText;
			document.getElementById("contact_no").value=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","ajaxsubcat.php?e="+empid, true);
	xmlhttp.send();
}
</script>

<div class="content">
				<!--login-->
			<div class="login" >
		        <div class="main-agileits">
				    <div class="form-w3agile form1" id="profile">
						<h3>Update Employee</h3>
							 
<form action="" method="post" >
<div class="form-group">
	<label for="Emp_Name">Employee Name</label>
	
								<select name="empid" id="empid " value="<?php echo $empid; ?>" onchange="fillemployee(this.value)" class="form-control">
								  <?php
								  
								 $rs = mysqli_query($con, "Select * from employee where status='Active'");
								 echo "<option value='0'>-- Select --</option>";
								 while($row= mysqli_fetch_array($rs))
								 {
									 if($empid == $row[0])
									 {
										  echo "<option value='".$row[0]."'>".$row[1]."</option>";
										  echo "<script>fillsalary(".$salaryid.",".$empid.")</script>";
									 }
									 else
									 {
										  echo "<option value='".$row[0]."'>".$row[1]."</option>";
									 }
									
								 }
								  ?>
								</select>
                                	</div>
</div>
<div class="form-group">
	<label for="Emp_Name">Gender</label> &nbsp;
 
	<input name="gender" type="radio" value="Male" <?php if($gender == "Male") echo "checked"; ?> />Male &nbsp;&nbsp;
<input type="radio" name="gender" value="Female" <?php if($gender == "Female") echo "checked"; ?> />Female
</div>
<div class="form-group">
	<label for="Emp_Name">Email Id</label>
	<input type="email" class="form-control" id="emailid"  name="emailid" readonly />
</div>
<div class="form-group">
	<label for="Emp_Name">Adress</label>
	<textarea class="form-control" id="address" placeholder="Enter Address" name="address"  readonly required ><?php echo $address; ?></textarea>
</div>
<div class="form-group">
	<label for="Emp_Name">Designation</label>
	<input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation"  required value="<?php echo $designation; ?>" readonly>
</div>
<div class="form-group">
	<label for="Emp_Name">Salary</label>
	<input type="text" class="form-control" id="salary" placeholder="Enter Salary" name="salary"   readonly value="<?php echo $salary; ?>">
</div>
<div class="form-group">
	<label for="Emp_Name">Contact Number</label>
	<input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No." name="contact_no" required value="<?php echo $contact_no; ?>" readonly>
</div>
<center>
<input type="button" name="updatep" id="updatep" class="btn btn-primary" value="UPDATE PROFILE" onclick="updateProfile()"/><br/>
<input type="submit" name="update" id="update" class="btn btn-primary" value="UPDATE" style="display:none;"/><br/>
<input type="button" name="btnreset" id="btnreset" class="btn btn-primary" value="CANCEL" style="display:none;" onclick="window.location.reload();"/>
</center>
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
<script>
function updateProfile()
{
	 $("#empname").removeAttr('readonly');
	 $("#gender").removeAttr('readonly');
	 $("#designation").removeAttr('readonly');
	   $("#salary").removeAttr('readonly');
		 $("#contact_no").removeAttr('readonly');
		 $("#address").removeAttr('readonly');
		 $("emailid").removeAttr('readonly');
		document.getElementById("update").style.display = "block";
		 document.getElementById("btnreset").style.display = "block";
		  document.getElementById("updatep").style.display = "none";
		 	
}
</script>
