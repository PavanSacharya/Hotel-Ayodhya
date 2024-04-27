<?php 
error_reporting(0);
include("sqlcon.php");

										$status_query = "SELECT * FROM room_book WHERE confirm=0";
										$result_query = mysqli_query($con, $status_query);
										$count = mysqli_num_rows($result_query);
										$data = array(
										   'unseen_notification'  => $count
										);
										echo json_encode($data);
										

?>