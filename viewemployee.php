<?php
include("sqlcon.php");
error_reporting(0);
session_start();
if(!isset($_SESSION["utype"]))
{
	header('Location:index.php');
}
else if($_SESSION["utype"] != "admin")
{
	//header('Location:index.php');
}

if(isset($_GET["id"]))
{
	$rs = mysqli_query($con, "delete from employee where empid=".$_GET['id']);
	{
		echo "<script>alert('You want to delete this employee');</script>";
	}
}

?>


<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>View Employee</span></h3>
			</div>
		</div>
	<!--banner-->

<p>&nbsp;</p>
							 
 <h3 align="center" >View Employee</h3> 
 			<div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
								<thead>
									<tr>
										<th>EmpId</th>
										<th>Name</th>
                                        <th>Gender</th> 
									    <th>Designation</th>
                                        <th>Basic Salary</th>
										<th>Email</th>
                                        <th>Contact No.</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$result = mysqli_query($con, "select * from employee where status='Active'");
								//$c = 1;
								while($row1=mysqli_fetch_array($result))
					
									echo "<tr>
										<td>".$row1['empid']."</td>
										<td>".$row1['empname']."</td>
										<td>".$row1['gender']."</td>
										<td>".$row1['designation']."</td>
										<td>".$row1['salary']."</td>
										<td>".$row1['emailid']."</td>
										<td>".$row1['contact_no']."</td>                                                                   
										<td><a href='viewemployee.php?id=$row1[0]'><img src='images/del.png' width='25px' height='25px'/></a></td>
									</tr>";
								
								 ?>
								</tbody>
							</table>
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