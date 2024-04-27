
<?php
include("sqlcon.php");
error_reporting(0);
session_start();

if(!isset($_SESSION["utype"]))
{
	echo "<script>window.location='userlogin.php'</script>";
}
else if($_SESSION["utype"] != "admin")
{
		echo "<script>window.location='index.php'</script>";
}

?>


<?php include("header.php"); ?>
	
<p>&nbsp;</p>


	<div class="content">
			<div class="cart-items">
				<div class="container">
				
				<?php
					$rst = mysqli_query($con, "select * from purchase inner join shippingaddress on purchase.shipping_add=shippingaddress.adr_id inner join order_status on purchase.order_status = order_status.o_statusid order by purchase_id DESC");
					$i = mysqli_num_rows($rst);
					if(mysqli_num_rows($rst) > 0)
					{
						$count = mysqli_num_rows($rst);
						?>
						 <h2>My Order (<?php echo $count; ?>)</h2>
						 <div class="cart-header">
								 <div class="cart-sec simpleCart_shelfItem">
									   <div >
									    <div class="table-responsive">
								  <table class="table table-bordered table-hover table-striped" id="dataTables-example">
									<thead>
									<tr>
										<th>#</th>
										<th>Order No.</th>
										<th>Items</th>
										<th>Order Date</th>
										<th>Shipping Address</th>
										<th>Payment Type</th>
										<th>Total Amount</th>
										<th>Order Status</th>
									</tr>
								</thead>
								<tbody>
								<?php
						 $c = 1;
						while($row = mysqli_fetch_array($rst))
						{
							echo "<tr><td>". $c++ ."</td>";
							echo "<td>". $row['order_no']."</td>";
							echo "<td>";
							echo "<table class='table table-bordered table-hover table-striped'><tr><th colspan='2'>Item</th><th>Qty.</th></tr>";
							$sql2 = mysqli_query($con, "select * from cart inner join product on cart.prodid=product.product_id inner join brand on product.brand_id=brand.brand_id left join prodimage on product.product_id=prodimage.prod_id where billid = $row[0] group by product.product_id");
							while($rows = mysqli_fetch_array($sql2))
							{
								echo "<tr><td><img src='".$rows['image_path']."' width='100px' height='100px' alt='' class='img'></td>";
								echo "<td><h3>".$rows['product_name']."</h3><br/>Brand: ".$rows['brand_name']."</td>";
								echo "<td>".$rows['qty']."</td></tr>";
							}
							echo "</table></td>";
							echo "<td>". $row['order_date']."</td>";
							echo "<td><ul class='qty'><li><h3>".$row['fullname']."</h3></li><br/><li><p>".$row['address_line1']."</p></li><br/><li><p>".$row['address_line2']."</p></li><br/><li><p>".$row['city']."</p></li><br/><li><p>".$row['state']."</p></li><br/><li><p>".$row['pincode']."</p></li><br/><li><p>Mobile: ".$row['contactno']."</p></li></ul></td>";
							echo "<td>". $row['pay_type']."</td>";
							echo "<td>". $row['total_amt']."</td>";
							echo "<td><b>". $row['purchase_order_status']."</b></td>";
						}
						?>	
								</tbody>
							</table>
	        </div>  
									   </div>
									   <div class="clearfix"></div>
															
								  </div>
							 </div>
				<?php				
						
					}
					else{
						echo "<h3 align='center'>Cart is Empty</h3>";
					}
					?>
					</div>
		</div>
		
	</div>
		
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
            'pageLength'
        ]
	} );
        });
    </script>
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls1.render();

        w3ls1.cart.on('w3sb1_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->  
 

