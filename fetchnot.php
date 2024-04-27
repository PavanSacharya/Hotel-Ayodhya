
<?php 
error_reporting(0);
include("sqlcon.php");

if(isset($_GET['name']))
{
	$name=$_GET['name'];


										$status_query = "SELECT * FROM room_book WHERE confirm=1 and name='$name' and status=0";
										$result_query = mysqli_query($con, $status_query);
										$count = mysqli_num_rows($result_query);
										
										$status_query1 = "SELECT * FROM cancel WHERE name='$name' and status=0";
										$result_query1 = mysqli_query($con, $status_query1);
										$count1 = mysqli_num_rows($result_query1);
										
										$data = array(
											'unseen_notification1'  => $count1,
										   'unseen_notification'  => $count
										);
										echo json_encode($data);
}

if(isset($_GET['val']) and isset($_GET['name']))
{
	$name=$_GET['name'];
	$status_query = "UPDATE `room_book` SET `status`=1 WHERE name='$name'";
	mysqli_query($con, $status_query);
}
										

?>