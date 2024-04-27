<?php
include("sqlcon.php");
session_start();
error_reporting(0);

	$sql = "SELECT * FROM attendance WHERE empid='$_GET[employee_id]' AND date='$_GET[attendancedate]'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	if(mysqli_num_rows($qsql) ==1 )
	{
		$sql = "UPDATE attendance SET attendance_type='$_GET[atttype]'  where empid='$_GET[employee_id]' and date='$_GET[attendancedate]'";
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql = "INSERT INTO attendance(empid,attendance_type,date,status)VALUES('$_GET[employee_id]','$_GET[atttype]','$_GET[attendancedate]','Active')";		
		$qsql = mysqli_query($con,$sql);
		if(!$qsql)
		{
			echo mysqli_error($con);
		}
	}

?>