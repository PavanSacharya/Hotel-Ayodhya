<?php
include("sqlcon.php");
error_reporting(0);
session_start();
include("sendmail.php");
if(isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
}
?>
<?php
if(isset($_POST['fpass']))
{
	$email=$_POST['email'];
	$check_user_data = mysqli_query($con,"SELECT * FROM user WHERE email_id = '".$_POST['email']."'") ;
	
	if(mysqli_num_rows($check_user_data) == 0)
	{
		echo '<script>alert("This email address does not exist. Please try again.")</script>;';
	}
	else 
	{
		$row = mysqli_fetch_array($check_user_data);
		$email=$row['email_id'];
		$to = $email;
		$subject  =  "Here are your login details . . . ";
			$message = "This is in response to your request for login details as user of our Beautykart.<br/>Your Name is ".$row['full_name'].".<br/>Your  Password is ".$row['password'].".<br/>Don't give your password to anyone in your group, but do save it somewhere safe. <br/><br/> Enjoy!!..<br/>Regards,<br/>the management";
		
		sendmail($to,$subject,$message,$row['username']);
	}
}

?>

<?php include("header.php"); ?>
	<!-- //breadcrumb -->
<div class="content">
				<!--login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile">
			<h3 class="w3ls-title w3ls-title1">Forgot Password</h3>  
		 
				<form name="MyForm" method="POST"  action="#" style="min-height:350px;">
							<label>Enter Registered email Id</label>
			            	<div class="key">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="email" value="" name="email" id="email" required="">
								<div class="clearfix"></div>
							</div>
 
					<input type="submit" value="Recover" name="fpass" class="btn btn-primary" width="100%">  <br/>
					<input type="button" value="Go back to Home Page" onClick="window.location='index.php'" class="btn btn-primary"> 
				</form>
				
			 	 
			</div>
			</div>
				<!--login-->
		</div>
		<?php 
			include("footer.php");
			?>
</body>
</html>

<script language="javascript">

function validateemail(){

var ck_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/; 
if (document.MyForm.email.value.search(ck_email)==-1)
{alert("That email address is not valid.");return false}

return true}

</script>

</body></html>
<?php 
	include("footerbar.php");
	?>
	<!-- //footer -->   
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js --> 
	<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  	
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" id="sourcecode">
		$(function()
		{
			$('.scroll-pane').jScrollPane();
		});
	</script>
	<!-- //the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script> <!-- the mouse wheel plugin --> 
	<!-- start-smooth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>  
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	
	
	<!-- //smooth-scrolling-of-move-up -->  
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>