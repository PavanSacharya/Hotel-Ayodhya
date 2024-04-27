<?php 
include('sqlcon.php');

$id=$_GET['room_id'];

$sql=mysqli_query($con,"select * from rooms where room_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("/images/$img");

if(mysqli_query($con,"delete from rooms where room_id='$id' "))
{
header('location:viewrooms.php');	
}

?>