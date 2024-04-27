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
    $tmp_name=$_FILES['img']['tmp_name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'images/'.$img);
$qry = "insert into services(s_name,details,image)values('".$_POST['s_name']."','".$_POST['details']."','$img')";
if(mysqli_query($con,$qry))
    {
        echo "<script>alert('Service Added!!!');window.location='service.php';</script>>";
    }
    else
    {
        echo"<script>alert('Service Already Exist');</script>";
    }

    
            
}
   



?>

<?php include("header.php"); ?>
        
        <!--header-->
        <!--banner-->
        <div class="banner1">
            <div class="container">
                <h3><a href="index.php">Home</a> / <span>Add Service</span></h3>
            </div>
        </div>
    <!--banner-->

    <!--content-->
        <div class="content">
                <!--login-->
            <div class="login">
                <div class="main-agileits">
                    <div class="form-w3agile form1">
                        <h3>Add Services</h3>
                        
                    <form method="post" action="" name="frmproduct" onsubmit="return validatecombo()" enctype="multipart/form-data">
                         
                            <div class="form-group">
     
    <label for="service">Service Name</label>
      
       <input type="text"   class="form-control" id="s_name" name="s_name" placeholder="Enter service Name"required>
     </div>
   
                            
                            <div class="form-group">
                                <label for="room">Details</label>
                            <textarea name="details" id="details" cols="45" rows="5" class="form-control"><?php echo $details; ?></textarea>
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
		
        <h1 align="center">Categories</h1>
<div class="form-w3agile form1">
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example5">
<thead>
	<tr>

		<th>Sr No</th>
		<th>Name</th>
		<th>Detail</th>
		<th>Delete</th>
     
        
	</tr>
</thead>
	<tbody>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from services");
while($res=mysqli_fetch_assoc($sql))
{
	$id=$res['s_name'];
?>

<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['s_name']; ?></td>
		<td><?php echo $res['details']; ?></td>

        

<?php
		
		echo "<td><a href='updateservice.php?s_name=$id'><img src='images/del.png' width='25px' height='25px'/></a></td>";
	?>
	</tr>	
<?php 	
}
?>	
</tbody>	
</table>
</div>
</div>		

		
        <!--content-->
        <!---footer--->
            <?php 
            include("footer.php");
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
            $('#dataTables-example5').dataTable({
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