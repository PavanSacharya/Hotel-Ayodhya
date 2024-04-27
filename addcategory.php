<?php
include("sqlcon.php");
session_start();
error_reporting(0);
 
if(!isset($_SESSION["utype"]))
{
	header('Location:index.php');
}
else if($_SESSION["utype"] != "admin")
{
		header('Location:index.php');
}
if(isset($_POST['submit']))
{
	$img=$_FILES['img']['name'];
	$type=$_POST['type'];
	$tmp_name=$_FILES['img']['tmp_name'];
	move_uploaded_file($_FILES['img']['tmp_name'],'images/'.$img);
	$sql=mysqli_query($con,"SELECT `type` FROM `room_category` where type='$type'");

$row=mysqli_fetch_assoc($sql);

if( $row['type']=="")
{
	$type=$_POST['type'];
	$price=$_POST['price'];
	$detail=$_POST['details'];
	$qry = "INSERT INTO `room_category`(`r_typeid`, `type`, `price`, `detail`, `img`, `booked`, `available`, `total`) VALUES('','$type','$price','$detail','$img','0','0','0')";

	if(mysqli_query($con,$qry))
   
	{
		echo "<script>alert('Room catgory Added!!!');window.location='addcategory.php';</script>>";
	} 
	else{
		echo "<script>alert('Categoryhey Already Exists');</script>";
		echo "<script>alert('Category Already Exists');</script>";
	} 
}
else{
	
	if($row['type']==$_POST['type']){
		echo "<script>alert('This category already exists!!');</script>";
	}else
	{
	$qry = "INSERT INTO `room_category`(`r_typeid`, `type`, `price`, `detail`, `img`, `booked`, `available`, `total`) VALUES('','".$_POST['type']."','".$_POST['price']."','".$_POST['details']."','$img','0','0','0')";
		if(mysqli_query($con,$qry))
	   
		{
			echo "<script>alert('Room catgory Added!!!');window.location='addcategory.php';</script>>";
		} 
		else{
		echo "<script>alert('Category bye Already Exists');</script>";
			echo "<script>alert('Category Already Exists');</script>";
		} 
}
}

}
?>
<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.php">Home</a> / <span>Add Room category</span></h3>
			</div>
		</div>
	<!--banner-->
	content-->
		<div class="content">
				<!--login-->
			<div class="login">
		        <div class="main-agileits">
				    <div class="form-w3agile form1">
						<h3>Add Room category</h3>
						
					<form method="post" action="" name="frmproduct" onsubmit="return validatecombo()" enctype="multipart/form-data">
						<div class="form-group">
								<label for="room">Room Type</label> 
								<input type="text" class="form-control" id="type" value="<?php echo $type; ?>"  placeholder="Enter Room Type" name="type" required >
								
								 
							</div>
							
							<div class="form-group">
								<label for="room">Details</label>
							<textarea name="details" id="details" cols="45" rows="5" class="form-control"><?php echo $details; ?></textarea>
							</div>
							<div class="form-group">
								<label for="room">Price</label>
								<input type="text" class="form-control" id="price" value="<?php echo $price; ?>"  placeholder="Enter Price" name="price" required >
							</div>
							
							
						
							<div class="form-group">
								<label for="room"> Image</label>
								<input type="file" name="img"  id="img" class="form-control"/>
							</div>
							
							<?php
							if(isset($_GET['id']))
							{ 
						    ?>
							<input type="submit" name="update" id="update" value="Update" class="btn btn-primary"/>&nbsp;
							<?php
							}
							else
							{  
							?>
								 <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"/>&nbsp;
							<?php 
							}
							?>
								 <input type="reset" name="cancel" id="cancel" value="cancel" class="btn btn-primary"/>
   </div>
 
   </form>

 </div>
			    </div>
		    </div>
				<!--login-->
		</div>
		<!--content-->

<div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
	<h1 align="center">Categories</h1><hr>
	<tr>
	<tr style="height:40">
		<thead>
		<th>Sr No</th>
		<th>Type</th>
		<th>Price</th>
		<th>Details</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
</thead>
	<tbody>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from room_category");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['r_typeid'];	
?>

<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['type']; ?></td>
		<td><?php echo $res['price']; ?></td>
		<td><?php echo $res['detail']; ?></td>
		<?php
		echo "<td><a href='updatecat.php?id=$id'><span class='glyphicon glyphicon-pencil'></span></a></td>";

		
		echo "<td><a href='ajaxsubcat.php?r_typeid=$id'><img src='images/del.png' width='25px' height='25px'/></a></td>";
	?>
	</tr>	
<?php 	
}
?>	
</tbody>	
</table>
</div>
</div>
 
		<!---footer--->
			<?php 
			include("footer.php");
			?>
			<script>
			function val()
{
	var flag=confirm("Do you want to delete the record");
	if(!flag)
	return false;
	else
	return true;
}


function delrecord(r_typeid)
{
	console.log("im here");
	var flag=confirm("Do you want to delete the record");
	if(!flag)
	{
	return false;
	}
	else 
	{
		console.log("im here1");
		if(window.XMLHttpRequest)
		{
			xmlhttp= new XMLHttpRequest();
			console.log("im here2");
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{
			console.log("im here3");
			
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				console.log("im here4");
				
				if(xmlhttp.responseText == "success")
				{
					console.log("im here5");
					window.location = 'addcategory.php';
				}
			}
		}
		console.log("im here6");
		xmlhttp.open("","ajaxsubcat.php?r_typeid="+r_typeid, true);
		xmlhttp.send();
		
	}
	
}
</script>

						 
