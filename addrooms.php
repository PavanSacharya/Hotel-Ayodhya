<?php
include("sqlcon.php");
session_start();
error_reporting(0);
 



if(!isset($_SESSION["utype"]))
{
	header('Location:index.php');
}
else if($_SESSION["utype"] != "admin")
{
		header('Location:index.php');
}
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"select * FROM room_category where r_typeid='".$_POST['type']."'");
$res=mysqli_fetch_assoc($sql);
echo $res['total'];
echo $res['booked'];
echo $res['available'];
										
$qry = "insert into rooms(room_no,r_typeid)values('".$_POST['room_no']."','".$_POST['type']."')";
mysqli_query($con,$qry);
$total=$res['total']+1;
$booked=$res['booked'];
$available=$total-$booked;

$qry = "UPDATE `room_category` SET `booked`=$booked,`available`=$available,`total`=$total where r_typeid='".$_POST['type']."'";

	if(mysqli_query($con,$qry))
   
	{
		echo "<script>alert('Room Added!!!');window.location='viewrooms.php';</script>>";
	}
   
}


?>


		<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.php">Home</a> / <span>Add Rooms</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
		        <div class="main-agileits">
				    <div class="form-w3agile form1">
						<h3>Add Rooms</h3>
						
					<form method="post" action="" name="frmproduct" onsubmit="return validatecombo()" enctype="multipart/form-data">
						 
							<div class="form-group">
								<label for="Room">Room Number</label>
								<input type="text" class="form-control" id="room_no" value="<?php echo $room_no; ?>"  placeholder="Enter Room No" name="room_no" required >	
                            </div>
						 
							


		                   	<div class="form-group">
								<label for="room">Room Type</label> 
								
								  <select name="type" id="type" value="<?php echo $type; ?>" class="form-control">
								   <?php
								  
								 $rs5 = mysqli_query($con, "Select * from room_category");
								 echo "<option value='0'>-- Select --</option>";
								 while($row5= mysqli_fetch_array($rs5))
								 {
									 if($r_typeid == $row5[0])
									 {
										  echo "<option value='".$row5[0]."' selected>".$row5[1]."</option>";
									 }
									 else
									 {
										  echo "<option value='".$row5[0]."'>".$row5[1]."</option>";
									 }
									
								 }
								  ?>
								</select>
							</div>
							
							
							
							<?php
							if(isset($_GET['id']))
							{ 
						    ?>
							<input type="submit" name="update" id="update" value="Update" class="btn btn-primary"/>&nbsp;
							<?php
							}
							else
							{  
							?>
								 <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"/>&nbsp;
							<?php 
							}
							?>
								 <input type="reset" name="cancel" id="cancel" value="cancel" class="btn btn-primary"/>
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



