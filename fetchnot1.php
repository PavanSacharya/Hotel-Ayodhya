
<?php 
error_reporting(0);
include("sqlcon.php");

	$name=$_GET['name'];
	$status_query = "UPDATE `room_book` SET `status`=1 WHERE name='$name'";
	mysqli_query($con, $status_query);
	
	$status_query1 = "UPDATE `cancel` SET `status`=1 WHERE name='$name'";
	mysqli_query($con, $status_query1);
	
	$count = 0;
	$data = array(
										   'unseen_notification123'  => $count
										);
										echo json_encode($data);
									

?>