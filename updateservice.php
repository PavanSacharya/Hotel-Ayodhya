<?php
include("sqlcon.php");
session_start();

if(isset($_GET["s_name"]))
{
	$id=$_GET["s_name"];
	mysqli_query($con, "DELETE FROM `services` WHERE s_name='$id'");
	header("Location:addservice.php");
	

	
}


?>