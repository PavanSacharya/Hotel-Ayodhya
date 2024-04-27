<?php 
include("header1.php");
?>
<?php 
include("sqlcon.php");
$sql="SELECT SUM(available) FROM room_category";
$res=mysqli_query($con, $sql);
while($row = mysqli_fetch_array($res)){
	$no =$row['SUM(available)'];
}
?>
<br/>

<h3 align="center" >Total Rooms Available is: <?php echo $no;?></h3> 
<h3 align="center" >New Booking Details</h3> 
      <div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
                 <thead>
    <tr>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Occupancy</th>
					<th>Update</th>
          
               

  </tr>
</thead>
               <tbody>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from room_book where confirm=0");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];  
$name=$res['name'];
$type=$res['roomtype'];

?>
<tr>
    
    <td><?php echo $res['name']; ?></td>
      <td><?php echo $res['roomtype']; ?></td>
        <td><?php echo $res['checkindate']; ?></td>
            <td><?php echo $res['checkoutdate']; ?></td>
              <td><?php echo $res['occupancy']; ?></td>
			   <?php echo "<td><a href='updatebookingstatus.php?name=$name&type=$type'><span class='glyphicon glyphicon-pencil'></span></a></td>"?>
			  
        


    
  </tr> 
<?php   
}


?>  
</tbody> 
              </table>
          </div>  
</div> 


<h3 align="center" >Booking Details</h3> 
      <div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example1">
                 <thead>
    <tr>
                    <th>Name</th>

                    <th>Mobile Number</th>
                    <th>Services</th>
                    <th>Room Type</th>
 
                    <th>Occupancy</th>
					<th>Status</th>
					<th>Update</th>
					
					
          
               

  </tr>
</thead>
               <tbody>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from room_book where confirm!=0");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];  
$name=$res['name'];
$type=$res['roomtype'];
$cancel=$res['cancel'];


if($cancel==0)
{
if($res['confirm']==1)
{
	$msg="Confirmed";
}
if($res['confirm']==2)
{
	$msg="Checked In";
}
}
else
{
	$msg="Cancelled";
}

?>
<tr>
    
    <td><?php echo $res['name']; ?></td>

    <td><?php echo $res['mobile']; ?></td>
    <td><?php echo $res['services']; ?></td>
      <td><?php echo $res['roomtype']; ?></td>

              <td><?php echo $res['occupancy']; ?></td>
			  <td><?php echo $msg ?></td>  
			    <?php echo "<td><a href='updatebookingstatus.php?name=$name&type=$type'><span class='glyphicon glyphicon-pencil'></span></a></td>"?>
			  
        


    
  </tr> 
<?php   
}
?>  
</tbody> 
              </table>
          </div>  
</div> 






<?php
include('Footer.php')
?>
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
        $(document).ready(function () {
            $('#dataTables-example1').dataTable({
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
