<?php
session_start();
error_reporting(0);
include("sqlcon.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Hotel Room Booking</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="js/main.js"></script>
<!--search jQuery-->
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });


 </script>
 <!--mycart-->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
  <!--start-rate-->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});

		</script>
<!--//End-rate-->
<script>
/*$(function () {
  	var today = new Date().toISOString().split('T')[0];
document.getElementsByName("checkindate")[0].setAttribute('min', today);

$(document).on('change', '.checkin', function(){
var now=document.getElementsByName("checkindate")[0].value;
console.log(now);
document.getElementsByName("checkoutdate")[0].setAttribute('min', now);
});*/

/*var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
var dat=tomorrow.toISOString().split('T')[0];
console.log(dat);


})*/
</script>
<style type="text/css">
#search input[type=text] {
  width:75%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
#search input[type=text]:focus {
    width: 75%;

}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
.margin_zero{
	margin:0px 0px 0px 0px !important;
}
.mt20{
	margin-top:20px !important;
	padding-left:50px !important;
}
#map {
        height: 200px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					 
					<div class="top-right">
					<ul>
						
						<?php 
						if($_SESSION["utype"] != "")
						{
							echo "<li style='color:gold;font-weight:bold;'>Welcome ".$_SESSION['uname']."!</li>";
							if($_SESSION["utype"] == "user")
							{
								?> 
								<li><a href="changepass.php">Change Password</a></li>
						        <li><a href="myprofile.php">Profile</a></li>
						        <li><a href="feedback.php">Feedback</a></li>

								
								
									  
							
								
								<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
								   
								<?php
							}
							else if($_SESSION["utype"] == "admin")
							{
								?>
								<li><a href="changepass.php">Change Password</a></li>
								<li><a href="logout.php">Logout</a></li>
								<?php
							}
							
							else if($_SESSION["utype"] == "employee")
							{
								?>
								<li><a href="changepass.php">Change Password</a></li>
								<li><a href="logout.php">Logout</a></li>
								<?php
							}
							
						}
						else
							{ 
						?>
						    		
								    <li><a href="userlogin.php">Login</a></li>
						        <li><a href="registration.php"> Create Account </a></li>
					  <?php }
						?>
						
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="index.php">HOTEL AYODHYA<span>Stay With Relax             </span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
								<li class="active"><a href="index.php" class="act">Home</a></li>
									
								<li> <a href='about.php'>About</a></li>
								<li><a href='service.php'>Service</a></li>	

							       <?php
								   if(!isset($_SESSION["utype"]) || $_SESSION['utype'] == "user")
								   {
									$ret = mysqli_query($con, "select * from category where status='Active'");
									$a = 0;
									while($row1=mysqli_fetch_array($ret))
									{
									$ret1 = mysqli_query($con, "select * from subcat where cat_id=$row1[0]");
									if(mysqli_num_rows($ret1) > 0)
									{
									?>
								   <li><a href="allproduct.php?cat=<?php echo $row1[0]; ?>"  class="dropdown-toggle act" data-toggle="dropdown" ><?php echo $row1[1]; ?><b class="caret"></b></a>
								   <ul class="dropdown-menu multi-column columns-2" style="width:150px;">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
													<?php
											
														$ret1 = mysqli_query($con, "select * from subcat where cat_id=$row1[0]");
														$c = 0;
														while($row2 = mysqli_fetch_array($ret1))
														{	
													?>
														<li><a href="allproduct.php?scat=<?php echo $row2[0]; ?>"><?php echo $row2['subcat_name']; ?></a></li>
														 <?php
														}
														?>
													</ul>
												</div>
											</div>
									</ul>		
								   </li>	
								
									<?php
									}
									else{
										?>
										 <li><a href="allproduct.php?cat=<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></a></li>
										<?php
									}
									}
									if($_SESSION["utype"]=="user")
									{
									
									
										echo "<li> <a href='rooms.php'>Rooms</a></li>";

									}
								   }
									if($_SESSION["utype"] != "" && $_SESSION["utype"]=="admin")
									{
								    ?>
									<li><a href="managecategory.php">Category</a></li>
									<li><a href="managesubcategory.php">Sub Category</a></li>
									<li><a href="managebrands.php">Manage Brand</a></li>-->
									
									
									 
								
									
									 <li><a href="#"  class="dropdown-toggle act" data-toggle="dropdown" >Employee<b class="caret"></b></a>
								   <ul class="dropdown-menu multi-column columns-2" style="width:150px;">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<li><a href="empregistration.php">Add Employee</a></li>
														<li><a href="viewemployee.php">View Employee</a></li>
														<li><a href="attendance.php">Attendance</a></li>
														<li><a href="viewattendance.php">View Attendance</a></li>
														<li><a href="salary.php">Add Salary</a></li>
													
													</ul>
												</div>
											</div>
									</ul>		
								   </li>
								   <li><a href="#"  class="dropdown-toggle act" data-toggle="dropdown" >Rooms<b class="caret"></b></a>
								   <ul class="dropdown-menu multi-column columns-2" style="width:150px;">
										<div class="row">
											<div class="multi-gd-img">
												<ul class="multi-column-dropdown">
														<li><a href="addcategory.php">Add Category</a></li>
														<li><a href="addrooms.php">Add Rooms</a></li>
														<li><a href="viewrooms.php">View Rooms</a></li>
														<li><a href='addservice.php'> Add Service</a></li>
												</ul>
											</div>
										</div>
									</ul>		
								   </li>
								   <li><a href="#"  class="dropdown-toggle act" data-toggle="dropdown" >View<b class="caret"></b></a>
								   <ul class="dropdown-menu multi-column columns-2" style="width:150px;">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<li><a href="viewfeedback.php">View feedback</a></li>
														<li><a href="booking_details.php">Booking Details</a></li>
													</ul>
												</div>
											</div>
									</ul>		
								   </li>		
																	
									
									
								  
								
										<?php	
									}
									else if($_SESSION["utype"] != "" && $_SESSION["utype"]=="employee")
									{
										?>
									
								   <li><a href="booking_details.php">Booking Details</a></li>
									<li><a href="managesubcategory.php">Report</a></li>
									<li><a href="managebrands.php">Billing</a></li>-->
									
									  

									
									
									
									
										<?php	
									}
									?>
								</ul>
							</div>
							</nav>
						</div>
						<div class="logo-nav-right">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul>  
							 <div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>