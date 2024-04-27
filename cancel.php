
<?php 
error_reporting(0);
include("sqlcon.php");

if(isset($_GET['name']))
{
	$name=$_GET['name'];
	$type=$_GET['type'];
	$no=$_GET['no'];
										
										$sql="UPDATE `room_book` SET `cancel`='1' WHERE roomtype='$type' and roon_no='$no' and name='$name'";
										mysqli_query($con, $sql);
										echo "<script>window.location ='book_status.php';</script>";
}

										

?>