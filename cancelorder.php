<?php
include("sqlcon.php");
error_reporting(0);
session_start();
if(!isset($_SESSION["utype"]))
{
	header('Location:index.php');
}
else if($_SESSION["utype"] != "user")
{
	//header('Location:index.php');
}

if(isset($_GET["id"]))
{
	$rs = mysqli_query($con, "delete from room_book where id=".$_GET['id']);
	{
		echo "<script>alert('You want to cancel this room');</script>";
	}
}

?>
