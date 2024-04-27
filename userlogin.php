<?php
include("sqlcon.php");
error_reporting(0);
session_start();
if(isset($_POST['login']))
{
	$rs = mysqli_query($con, "SELECT * FROM user where email_id='".$_POST['Email']."' and password='".$_POST['Password']."'");
	if(mysqli_num_rows($rs) > 0)
	{
		$result = mysqli_fetch_array($rs);


		$_SESSION['uid'] = $result['user_id'];
		$_SESSION['email_id'] = $result['email_id'];
		$_SESSION['utype'] = "user";
		$_SESSION['uname'] = $result['full_name'];
		
		if(isset($_SESSION["url"]))
		{
			//echo $_SESSION["url"];
			echo "<script>window.location='".$_SESSION["url"]."';</script>";
		}
		else
		{
			echo "<script>alert('Login successful!!!.');window.location='index.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('Invalid Username or password.');</script>";
	}
}
?>

<?php include("header.php"); ?>
		
		<!--header-->
		<!--banner-->
	
	   
		
	
	<div class="content">
				<!--login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile">
						<h3>Login To Hotel Ayodhya</h3>
						<form action="" method="post">
							<div class="key">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required >
								<div class="clearfix"></div>
							</div>
							<div class="key">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input  type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required pattern="[a-zA-Z0-9]{6,16}" title="please enter only character or numbers between 6 to 16 for password" >
								<div class="clearfix"></div>
							</div>
							<input type="submit" value="Login" name="login"><h3><a href="index.php">Home</a></h3>
						</form>
					</div>
					<div class="forg">
						<a href="forgotpassword.php" class="forg-left">Forgot Password</a>
						<a href="registration.php" class="forg-right">New User</a>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<!--login-->
		</div>
		
		<?php 
			include("footer.php");
			?>
</body>
</html>
