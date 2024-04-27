<?php
include("sqlcon.php");
session_start();
error_reporting(0);

if(!isset($_SESSION["utype"]))
{
	//header('Location:index.php');
}
else if($_SESSION["utype"] != "admin")
{
	//header('Location:index.php');
}

if(isset($_POST['submit']))
{
	$qry="INSERT INTO brandoffer (brand_id,offer_name,offer_pre,status) VALUES ('".$_POST['brand']."','".$_POST['offername']."',
	'".$_POST['percentage']."','".$_POST['status']."')";
	if(mysqli_query($con, $qry))
	{
		echo "<script>alert('Record Inserted.');window.location='brandoffers.php';</script>";
	}
}
if(isset($_POST['update']))
{
	$qry="UPDATE brandoffer SET brand_id='".$_POST['brand']."',offer_name='".$_POST['offername']."',offer_pre='".$_POST['percentage']."',status='".$_POST['status']."' where offer_id='".$_POST['offerid']."'";
	if(mysqli_query($con, $qry))
	{
		echo "<script>alert('Record Updated.');window.location='brandoffers.php';</script>";
	}
}

if(isset($_GET['id']))
{
	$rst = mysqli_query($con, "select * from brandoffer where offer_id='".$_GET['id']."'");
	$rows2 = mysqli_fetch_array($rst);
	$offer_id = $rows2[0];
	$brand_id = $rows2[1];
	$offer_name = $rows2[2];
	$offer_pre = $rows2[3];
	$status = $rows2[4];
}

?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Brand offers</span></h3>
			</div>
		</div>
	<!--banner-->

<div class="content">
				<!--login-->
				<?php
						if(isset($_SESSION["utype"]) && $_SESSION["utype"] == "seller")
						{
						?>
			<div class="login">
		        <div class="main-agileits">
				    <div class="form-w3agile form1">
						<h3>Brand Offers</h3>
						
		<form method="post" action="">
							<div class="form-group">
							<input type="hidden" value="<?php echo $offer_id; ?>" name="offerid">
								<label for="brand_Name">selct Brand</label>
									 <select name="brand" id="brand" class="form-control" required>
								   <?php
								  
								 $rs = mysqli_query($con, "Select * from brand ");
								 echo "<option value='0'>-- Select --</option>";
								 while($row= mysqli_fetch_array($rs))
								 {
									 if($brand_id == $row[0])
									 {
										 echo "<option value='".$row[0]."' selected='selected'>".$row[1]."</option>";
									 }
									 else 
									 {
										 echo "<option value='".$row[0]."'>".$row[1]."</option>";
									 }
									 
								 }
								  ?>
								  
								</select>
							</div>
                            <div class="form-group">
								<label for="offer_Name">offer name</label>
				<input type="text" class="form-control" id="offername" placeholder="Enter offer" name="offername" required value="<?php echo $offer_name; ?>">
							</div>
                            <div class="form-group">
								<label for="percentage">percentage</label>
								<input type="number" class="form-control" id="percentage" min="1" max="100" placeholder="Enter percentage" name="percentage" required value="<?php echo $offer_pre; ?>">
							</div>
                            <div class="form-group">
								<label for="status">status</label>
									 <select name="status" id="status" class="form-control" required>
								   <option <?php if($status == "Enable") echo "selected"; ?> >Enable</option>
                                    <option <?php if($status == "Disable") echo "selected"; ?>  >Disable</option>
								</select>
							</div>
                            
   
   
   
  <?php
  if(isset($_GET['id']))
  { ?>
	   <input type="submit" name="update" id="update" value="UPDATE"  class="btn btn-primary"/> 
  <?php }
  else
  { ?>
	   <input type="submit" name="submit" id="submit" value="SUBMIT"  class="btn btn-primary"/> 
  <?php }
  ?>
   
     <input type="reset" name="cancel" id="cancel" value="CANCEL"  class="btn btn-primary"/> 
 
<form>
 </div>
			    </div>
		    </div>
			 <?php
						}
						
						?>
				<div class="form-w3agile form1">
				<p>&nbsp;</p>
				<h3>View Brand Offers</h3>
				<p>&nbsp;</p>
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
								<thead>
									<tr>
										<th>#</th>
										<th>Brand</th>
                                        <th>offer</th>
                                        <th>percentage</th>
                                        <th>status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$result = mysqli_query($con, "select * from brandoffer inner join brand on  brandoffer.brand_id=brand.brand_id");
								$c = 1;
								while($row1=mysqli_fetch_array($result))
								{
									echo "<tr>
										<td>".$c++."</td>
										<td>".$row1['brand_name']."</td>
										<td>".$row1['offer_name']."</td>
										<td>".$row1['offer_pre']."</td>
										<td>".$row1['status']."</td>
										<td><a href='brandoffers.php?id=$row1[0]'><a onclick='delrecord($row1[0])'><img src='images/del.png' width='25px' height='25px'/></a></td>
									</tr>";
								}
								 ?>
								</tbody>
							</table>
	        </div>  
            <div>
</div>
</div> 
				<!--login-->

	 
		
 </div>
		<!--content-->
		<!---footer--->
			<?php 
			include("footer.php");
			?>
</body>
</html>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.12/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="Stuk-jszip-6d2b991/dist/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/demo.js">
	</script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
		dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
			'pdfHtml5'
        ]
	} );
        });
    </script>
<script>

function val()
{
	var flag=confirm("Do you want to delete the record");
	if(!flag)
	return false;
	else
	return true;
}


function delrecord(boid)
{
	var flag=confirm("Do you want to delete the record");
	if(!flag)
	{
	return false;
	}
	else 
	{
		if(window.XMLHttpRequest)
		{
			xmlhttp= new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				if(xmlhttp.responseText == "success")
				{
					alert('Record Deleted');
					window.location = 'brandoffers.php';
				}
			}
		}
		xmlhttp.open("GET","ajaxsubcat.php?boid="+boid, true);
		xmlhttp.send();
	}
	
}



</script>					