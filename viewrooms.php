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
   mysqli_query($con, "delete from rooms where room_no='".$_GET['no']."'");

  $sql=mysqli_query($con,"select * FROM room_category where r_typeid=".$_GET['id']."");
$res=mysqli_fetch_assoc($sql);


$total=$res['total']-1;
$booked=$res['booked'];
$available=$total-$booked;

$qry = "UPDATE `room_category` SET `booked`=$booked,`available`=$available,`total`=$total where r_typeid=".$_GET['id']."";

	if(mysqli_query($con,$qry))
  {
    echo "<script>alert('Do You Want To Delete This Room');</script>";
  }

}

?>


<?php include("headermain.php"); ?>
    
    <!--header-->
    <!--banner-->
    <div class="banner1">
      <div class="container">
        <h3><a href="index.html">Home</a> / <span>Booking Details</span></h3>
      </div>
    </div>
  <!--banner-->

<p>&nbsp;</p>
               
 <h3 align="center" >Room Details</h3> 
      <div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
                <thead>
                  <tr>
                    
                    <th>Sr No</th>
    <th>Image</th>
    <th>Room No</th>
    <th>Type</th>
    <th>Price</th>
    <th>Details</th>
    <th>Update</th>
    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
         $result = mysqli_query($con, "select * from rooms LEFT JOIN room_category ON rooms.r_typeid=room_category.r_typeid");

                $c = 1;
                while($row1=mysqli_fetch_array($result))
                {
                  $id=$row1['r_typeid'];  
                  $no=$row1['room_no'];  
                  
$img=$row1['img'];
$path="images/$img";
                  echo "<tr>
                    <td>".$c++."</td>
                    <td><img src='".$path."' width='100px' height='50px'/></td>
                    <td>".$row1['room_no']."</td>
                    <td>".$row1['type']."</td>
                    <td>".$row1['price']."</td>
                    <td>".$row1['detail']."</td>
                    <td><a href='updateroom.php?id=$id&no=$no'><span class='glyphicon glyphicon-pencil'></span></a></td>                                                                
                    <td><a href='viewrooms.php?id=$id&no=$no'><img src='images/del.png' width='25px' height='25px'/></a></td>
                  </tr>";
                }
                 ?>
                </tbody>
              </table>
          </div>  
</div> 
 
 
         
        <!--login-->
    </div>
    <!--content-->
    <!---footer--->
      
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