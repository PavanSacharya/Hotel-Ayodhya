
<?php
include("sqlcon.php");
session_start();
error_reporting(0);
if(isset($_GET['aid']))
{
	$qry = mysqli_query($con, "delete from shippingaddress where adr_id=".$_GET['aid']);
	if($qry)
	{
		echo "<script>alert('REcord deleted.');</script>";
	}
}

	$qry = mysqli_query($con, "select * from shippingaddress where user_id=".$_SESSION["uid"]);
	 ?>   
   <div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
</thead>
	<tr>   
	 <?php
	while($row = mysqli_fetch_array($qry))
	{
	echo "<td>";
	echo "<input type='radio' value='$row[0]' name='rbaddrs' onclick='selectaddr(this.value)'>&nbsp;";
	echo $row ["fullname"];
	echo "<span style='text-align:right;float:right;'><a onclick='deleteaddr($row[0])' ><i class='fa fa-times' aria-hidden='true'></i></a></span>";
	echo "<br/>";
	echo $row ["address_line1"];
	echo "<br/>";
	echo $row ["address_line2"];
	echo "<br/>";
	echo $row ["city"];
	echo "<br/>";
	echo $row ["state"];
	echo "<br/>";
	echo $row ["pincode"];
	echo "<br/>";
	echo "Mobile: ". $row ["contactno"];
	echo "</td>";
	}
	?>
	</tr></table></div>