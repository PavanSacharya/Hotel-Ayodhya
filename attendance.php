<?php
include("sqlcon.php");
session_start();
error_reporting(0);


?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.php">Home</a> / <span>Attendance</span></h3>
			</div>
		</div>
 <p>&nbsp;</p>
		       <p>&nbsp;</p>
						<h3 align="center">Attendance</h3>
		 <p>&nbsp;</p>
		  <p>&nbsp;</p>
		<form method="post" action="">
       <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>"  />

        <table width="667px" border="0" align="center">
        <tr>
        <th scope="col">&nbsp;Attendance Date</th>
        <th scope="col"><input name="attendancedate" type="date" class="form-control" style="width:250px;" value="<?php 
        if(isset($_POST[attendancedate]))
        {
        echo $attdate = $_POST[attendancedate];
        }
        else
        {
        echo $attdate = date("Y-m-d");
        }
        ?>" ></th>
        <th scope="col"><input type="submit" name="submit" value="Submit" class="btn btn_s" /></th>
        </tr>
        </table>
		</form>
			
		 <p>&nbsp;</p>
<div class="form-w3agile form1">
				<p>&nbsp;</p>
				<h3>Add Attendance</h3>
				<p>&nbsp;</p>
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
							<thead>
  <tr>
    <th height="41" scope="col"><br /><strong>Employee name</strong></th>
    <th scope="col"><br /><strong>Login ID</strong></th>
	<th scope="col"><br /><strong>Action</strong></th>
  </tr>
   </thead>
	<tbody>
  <?php
  $sql = "SELECT * FROM employee WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
	    $sqlattendance = "SELECT * FROM attendance WHERE empid='$empid' AND date='$attdate'";
  		$qsqlattendance = mysqli_query($con,$sqlattendance);
  		$rsattendance = mysqli_fetch_array($qsqlattendance);
	echo "<tr>
		<td>&nbsp;$rs[empname]</td>
		<td>&nbsp;$rs[emailid]</td>
		<td>";
		?>
		<input type="radio" name="attendance<?php echo $rs[empid]; ?>"  onclick='addattendance(`<?php echo $rs[empid]; ?>`,`<?php echo $attdate
?>`,`Present`)' 

<?php
if($rsattendance[attendance_type] =="Present")
{
echo ' checked="checked" ';
}
?>
>Present <br /> 
		<input type="radio"  name="attendance<?php echo $rs[empid]; ?>"   onclick='addattendance(`<?php echo $rs[empid]; ?>`,`<?php echo $attdate
?>`,`Absent`)' 
<?php
if($rsattendance[attendance_type] =="Absent")
{
echo ' checked="checked" ';
}
?>
>Absent</a> <br />
			
		<?php
		echo "</td></tr>";
  }
  ?>
  
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
	
	<script type="application/javascript">
function addattendance(employee_id,attendancedate,atttype)
{
	//alert(employee_id + " - " + attendancedate + " - " + atttype);
	    if (window.XMLHttpRequest)
		{
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		/*
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		*/
        xmlhttp.open("GET","ajaxattendance.php?employee_id="+employee_id+"&attendancedate="+attendancedate+"&atttype="+atttype,true);
        xmlhttp.send();
}
</script>