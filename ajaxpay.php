<?php
include("sqlcon.php");
session_start();
error_reporting(0);


if(isset($_GET['sellerid']))
{
	$sellerid = $_GET['sellerid'];
	$total = $_GET['total'];
	$admin_per = $_GET['admin_per'];
	$final_amt = $_GET['amt'];
	$paid_date = date('Y-m-d');
	if($total  > 0)
	{
	$qry = mysqli_query($con, "insert into sellerpayment(sellerid,total_amt,paidamount,admin_per,paid_date) values($sellerid,'$total','$final_amt','$admin_per','$paid_date')");
		if($qry)
		{
			echo "success";
		}
		else 
		{
			echo "error";
	}
	}
	else
	{
		echo "Payment can not be done now!!";
	}
}


?>