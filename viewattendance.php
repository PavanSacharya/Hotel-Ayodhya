<?php
include("sqlcon.php");
session_start();
error_reporting(0);

if(!isset($_SESSION['type']))
{
	//echo "<script>window.location.assign('index.php');</script>";
}
if(isset($_SESSION[delid]))
{
	$sql = "DELETE FROM attendance WHERE attendanceid='$_SESSION[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Attendance record deleted successfully..');</script>";
	}
	unset($_SESSION[delid]);
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
 <p>&nbsp;</p>
		       <p>&nbsp;</p>
 <h3 align="center">View Attendance</h3>
		 <p>&nbsp;</p>
		  <p>&nbsp;</p>
		<form method="post" action="">
       <input type="hidden" name="randomid" value="<?php echo $_SESSION[randomid]; ?>"  />
        <div>
        <table width="600px" border="0" align="center">
        <tr>
        <th scope="col">&nbsp;Attendance Month:</th>
        <th scope="col"><input name="attendancemonth" type="month" class="form-control" style="width:250px;" value="<?php 
        if(isset($_POST[attendancemonth]))
        {

        	echo $attdate = $_POST[attendancemonth];
        }
        else
        {
        echo $attdate = date("Y-m");
        }
        ?>" > 
		</th>
        <th scope="col"><input type="submit" name="submit" value="Submit" class="btn btn_s" /></th>
		
        </tr>
        </table>
        <p>&nbsp;</p>
</form>			
	<?php 
			$attmonthyear = strtotime($attdate."-01");
			$attmonth = date("m",$attmonthyear);
			$attyear = date("Y",$attmonthyear);
			$daysinmonth = cal_days_in_month(CAL_GREGORIAN, $attmonth, $attyear);
		//	echo $number;
?>
				<div class="form-w3agile form1">
				<p>&nbsp;</p>
				
				<p>&nbsp;</p>
				
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
								<thead>
  <tr>
  <th style="width:50px;" scope="col"><br /><strong>Employee ID</strong><br /></th>
    <th style="width:150px;" scope="col"><br /><strong>Employee name</strong><br /></th>
<?php
	for($i=1;$i<=$daysinmonth;$i++)
	{
   echo " <th scope='col'>$i</th>";
	}
?>    
    <th style="width:45px;" scope="col" style='color:green;'>P<br /></th>
    <th style="width:45px;" scope="col"  style='color:#C60;'>A</th>
	<th style="width:45px;" scope="col"  style='color:#C60;'>DaysWorked</th>
  </tr>
  </thead>	
	<tbody>
  <?php
  		$results = array();
	   	$sqlattendance = "SELECT * FROM attendance WHERE date BETWEEN '$attdate-01' AND '$attdate-$daysinmonth' AND status='Active'";
  		$qsqlattendance = mysqli_query($con,$sqlattendance);
$employee_id = array();
$attendance_type = array();
$attendance_date = array();
    while ($row = mysqli_fetch_array($qsqlattendance))
	{ 
		$employee_id[$row["empid"]][$row["date"]] = $row["empid"];
		$attendance_type[$row["empid"]][$row["date"]] = $row["attendance_type"];
		$attendance_date[$row["empid"]][$row["date"]] = $row["date"];		
    }
	//echo $attendance_date[5]['2017-02-09'];
	$p=0;
	$h=0;
	$a=0;
  $sql = "SELECT * FROM employee WHERE status='Active'";
  $qsql = mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
	echo "<tr>";
	echo "<td>&nbsp;$rs[empid]</td>";
	echo "<td>&nbsp;$rs[empname]</td>";
	for($i=1;$i<=$daysinmonth;$i++)
	{
		if($i<=31)
			
		{
			if($i<=9)
			{
			$i = "0".$i;
			}
		}
		if( ($attyear."-".$attmonth."-".$i) == $attendance_date[$rs["empid"]][$attyear."-".$attmonth."-".$i] )
		{
			if($attendance_type[$rs["empid"]][$attyear."-".$attmonth."-".$i] == "Present")
			{
		   			echo " <th scope='col' style='color:green;'>P</th>";	
					$p = $p+1;			
			}
			if($attendance_type[$rs["empid"]][$attyear."-".$attmonth."-".$i] == "Absent")
			{ 
		   			echo " <th scope='col' style='color:red;'>A</th>";
					$a = $a + 1;
			}
			
			$daysworked=$p+$h;
			
			
		}
		else
		{
			echo "<th scope='col'></th>";
		}
	}
	echo "<td><center>$p</center></td>";
	echo "<td><center>$a</center></td>";
	echo "<td><center>$daysworked</center></td>";
	echo "</tr>";
		$p=0;
	$a=0;
  }
  ?>
  </tbody>
</table>
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
		"scrollX": true,
		"scrollCollapse": true,
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
				