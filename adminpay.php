<?php 
include("sqlcon.php");
error_reporting(0);
session_start();


//SELECT seller.*, SUM(product.price*cart.qty) FROM seller INNER join product on seller.seller_id=product.seller_id inner join cart on product.product_id=cart.prodid where billid != 0 group by seller.seller_id

?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Update Account Details</span></h3>
			</div>
		</div>
	<!--banner-->

				<div class="form-w3agile form1">
				<p>&nbsp;</p>
				<h2 align="center">Seller Payment</h2>
				<p>&nbsp;</p>
                          <div class="table-responsive">
<table class="table table-bordered table-hover table-striped" id="dataTables-example">
								<thead>
									<tr>
										<th>#</th>
										<th>Seller</th>
										<th>Bank Name</th>
										<th>Account No.</th>
                                        <th>Amount</th>
                                        <th>Admin %</th>
                                        <th>Pay Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$result = mysqli_query($con, "select * from seller inner join tblselleraccount on seller.seller_id=tblselleraccount.sellerid left join sellerpayment on seller.seller_id=sellerpayment.sellerid where status='Active' order by sellerpayment.payid desc limit 1");
								$c = 1;
								
								while($row=mysqli_fetch_array($result))
								{
									
									$paid = date("Y-m-d");
									$total = 0;
									if($row['paid_date'] != null)
									{
									  $qry2 = "SELECT cart.cartid,cart.prodid,product.price,product.discount,(product.price*cart.qty) as amt, ROUND(((IFNULL(brandoffer.offer_pre,0) * product.price*qty)/100),2) as brandoffer, ROUND(((IFNULL(product.discount,0) * product.price*qty)/100),2) as discountamt, purchase.order_date,purchase.order_no FROM cart inner join product on cart.prodid = product.product_id LEFT JOIN brandoffer on cart.brand_offer=brandoffer.offer_id inner join purchase on cart.billid=purchase.purchase_id where billid != 0 and product.seller_id=$row[0] and purchase.order_date >= '".$row['paid_date']."'";
									}
									 else
									 {
										   $qry2 = "SELECT cart.cartid,cart.prodid,product.price,product.discount,(product.price*cart.qty) as amt, ROUND(((IFNULL(brandoffer.offer_pre,0) * product.price*qty)/100),2) as brandoffer, ROUND(((IFNULL(product.discount,0) * product.price*qty)/100),2) as discountamt, purchase.order_date,purchase.order_no FROM cart inner join product on cart.prodid = product.product_id LEFT JOIN brandoffer on cart.brand_offer=brandoffer.offer_id inner join purchase on cart.billid=purchase.purchase_id where billid != 0 and product.seller_id=$row[0] and purchase.order_date < '$paid'";
									 }
									$rs = mysqli_query($con, $qry2);
									while($row1 = mysqli_fetch_array($rs))
									{
										$amt = $row1['amt']-$row1['brandoffer']-$row1['discountamt'];
										$total = $total + $amt;
									}
									$adminamt = ($total*5)/100;
									$finalamt = $total - $adminamt;
									
									echo "<tr>
										<td>".$c++."</td>
										<td>".$row['seller_name']."</td>
										<td>".$row['bankname']."<br/>Branch: ".$row['branch']."</td>
										<td>".$row['accountno']."</td>
										<td><input type='text' value='".number_format((float)$total, 2, '.', '')."' name='total_amt' readonly/></td>
										<td><input type='number' value='5.00' name='admin_per'  id='admin_per' onchange='update_per(this.value,".$total.",".$row[0].")'/></td>
										<td><input type='text' value='".number_format((float)$finalamt, 2, '.', '')."' name='final_amt' id='final_amt".$row[0]."' readonly/></td>
										<td><a href='#' onclick='paynow(".$total.",".$finalamt.",".$row[0].",admin_per.value)'>Pay Now</a></td>
									</tr>";
								}
								 ?>
								</tbody>
							</table>
	        </div>  
            <div>
</div>
</div> 
	
	
	<?php 
			include("footer.php");
			?>
</body>
</html>
<script>
function update_per(percen, total,sellerid)
{
	var adminamt = (total*percen)/100;
	var finalamt = total - adminamt;
	var id = "final_amt"+sellerid;
	document.getElementById(id).value=finalamt;
}
function paynow(total,amt,sellerid,admin_per)
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
				if(xmlhttp.responseText.trim() == "success")
				{
					alert('Payment Success!!');
					window.location = 'adminpay.php';
				}
				else{
					alert(xmlhttp.responseText.trim());
				}
			}
		}
		xmlhttp.open("GET","ajaxpay.php?total="+total+"&amt="+amt+"&admin_per="+admin_per+"&sellerid="+sellerid, true);
		xmlhttp.send();
 
}
</script>