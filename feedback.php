<?php 
include("sqlcon.php");
error_reporting(0);
session_start();
if(isset($_POST['btnreg']))
{
	
	//echo 1111;
	$date = date("Y-m-d h:i:s");
	$qry = "insert into feedback(name,email,contact,feedback,posted_date,star) values('".$_POST['FullName']."','".$_POST['EmailID']."','".$_POST['ContactNo']."','".$_POST['Feedback']."','".$date."','".$_POST['usertype']."')";
	if(mysqli_query($con,$qry))
	{
	//	echo $qry;
		echo "<script>alert('Feedback successfull!!!');</script>";
	}
}

?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.php">Home</a> / <span>Feedback</span></h3>
			</div>
		</div>
	<!--banner-->

<div class="content">
				<!--login-->
			<div class="login">
		        <div class="main-agileits">
				    <div class="form-w3agile form1">
						<h3>Give your Feedback</h3>
						<form action="" method="post">
<div class="form-group">
	<label for="Name">Full Name</label>
	<input type="text" class="form-control" id="FullName" placeholder="Enter your name" name="FullName" required pattern="[a-zA-Z _]{4,20}" title="please enter only character  between 4 to 20 for user name">
</div>

<div class="form-group">
	<label for="EmailID">Email ID</label>
	<input type="email" class="form-control" id="EmailID" placeholder="Enter Email Id." name="EmailID" required >
</div>

<div class="form-group">
	<label for="contact">Contact No.</label>
	<input type="text" class="form-control" id="ContactNo" placeholder="Enter Contact No" name="ContactNo" required pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for contact no." min="7000000000" max="9999999999">
</div>

						
							
<div class="form-group">
	<label for="Feedback">Feedback</label>
	<textarea class="form-control" id="Feedback" placeholder="Enter Feedback" name="Feedback" required ></textarea>
</div>

<div class="form-group">
<label for="stars">Star Rating</label>
					<div class="key">
					
								 
								<select name="usertype"  id="usertype" required="" >
								<option value="0">-- Select --</option>
								<option value="1"> 1 </option>
								<option value="2"> 2 </option>
								<option value="3"> 3 </option>
								<option value="4"> 4 </option>
								<option value="5"> 5 </option>
								
								</select>
								<div class="clearfix"></div>
							</div>
							</div>
							
<input type="submit" name="btnreg" class="btn btn-primary" value="SUBMIT"/>&nbsp;
<input type="reset" name="btnreset" class="btn btn-primary" value="CANCEL"/>
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
function displayReason(subj)
{
	if(subj ==  "Others")
	{
		document.getElementById("divreason").style.display="block";
	}
	else
	{
		document.getElementById("divreason").style.display="none";
	}
}
</script>

