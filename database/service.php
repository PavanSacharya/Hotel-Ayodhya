
<?php 
include("sqlcon.php");
?>
<?php include("header2.php");
 ?>
<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">Our Services</h2>
						<div class="arrivals-grids">

						<?php 
	$sql=mysqli_query($con,"select * from services");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	
	<div class="col-sm-4">
		<img src="images/<?php echo $r_res['image'];?>"class="img-responsive thumbnail margin_zero"alt="Image"id="img" height="100" width="100"><!--Id Is Img-->
		<br>
      <h4 class="Room_Text">[ <?php echo $r_res['s_name'];?>]</h4>
     <p class="text-justify"><?php echo substr($r_res['details'],0,1000); ?></p><br>
	</div>

	

    
	<?php } ?>
	
						
				
						
							<?php 
												$c++;
												if($c%4 == 0)
												{
													echo "<div class='clearfix'></div></div>	<div class='product-tab'>";
												}
							
						
						?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
					