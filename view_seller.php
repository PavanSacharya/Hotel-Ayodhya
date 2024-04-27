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

?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Seller Information</span></h3>
			</div>
		</div>
	<!--banner-->

<div class="content">
	<h3 align="center" style="line-height:2.0em; font-weight:bold;">View Seller</h3>
	<div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
								<thead>
									<tr>
										<th>#</th>
										<th>Seller Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>PAN No.</th>
										<th>VAT/TIN No.</th>
										<th>Address</th>
										<th>City</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$result = mysqli_query($con, "select * from seller");
								$c = 1;
								while($row1=mysqli_fetch_array($result))
								{
									echo "<tr>
										<td>".$c++."</td>
										<td>".$row1['seller_name']."</td>
										<td>".$row1['seller_email']."</td>
										<td>".$row1['seller_phone']."</td>
										<td>".$row1['company_pan']."</td>
										<td>".$row1['vat_tin_no']."</td>
										<td>".$row1['seller_address']."</td>
										<td>".$row1['seller_city']."</td>
										<td>".$row1['status']."</td>
										<td align='center'> <a onclick='delrecord($row1[0])'><b>Block Seller</b></a></td>
									</tr>";
								}
								 ?>
								</tbody>
							</table>
	        </div>  
   
</div> 
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
	<script type="text/javascript">
	function delrecord(sellerid)
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
					alert("Seller Blocked");
					window.location = 'view_seller.php';
				}
			}
		}
		xmlhttp.open("GET","ajaxsubcat.php?sellerid="+sellerid, true);
		xmlhttp.send();
	}
	
}
</script>