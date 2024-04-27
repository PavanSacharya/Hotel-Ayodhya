<?php

include("sqlcon.php");
 if(isset($_GET['aid']))
 {
	 $rs = mysqli_query($con,"select * from shippingaddress where adr_id=".$_GET['aid']);
	 $row = mysqli_fetch_array($rs);
	 $aid = $row[0];
	 $fullname=$row[2];
	 $aline1=$row[3];
	 $aline2=$row[4];
	 $city=$row[5];
	 $state=$row[6];
	 $pincode=$row[7];
	 $contact=$row[8];
	 $email=$row[9];
 }
?>

						<form action="#" method="post" >
							<input type="hidden" value="<?php echo $ts; ?>" name="totalamt"/>
							<input type="hidden" value="<?php echo $aid; ?>" name="adr_id"/>
						<div class="col-md-3">
						<label>Fullname</label>
						<div class="key">
							<input  type="text"  name="aname" id="aname" required="" onkeyup="ValidateName();" placeholder="Fullname" value="<?php echo $fullname; ?>">
							<div class="clearfix"></div>
							<span id="lblError" style="color:red"></span>
						</div>
						</div>
						
						<div class="col-md-3">
							<label>Address Line1</label>
						<div class="key">
							<input  type="text"  name="aline1" required=""  placeholder="Address Line1" value="<?php echo $aline1; ?>">
							<div class="clearfix"></div>
						</div>
						</div>
						<div class="col-md-3">
							<label>Address Line2</label>
						<div class="key">
							<input  type="text"  name="aline2"  placeholder="Address Line2" value="<?php echo $aline2; ?>">
							<div class="clearfix"></div>
						</div>
						</div>
						<div class="col-md-3">
							<label>City</label>
						<div class="key">
							<input  type="text" onkeyup="Validatecity();" id="city" name="city" required=""  placeholder="City" value="<?php echo $city; ?>">
							<div class="clearfix"></div>
							<span id="lblErrorcity" style="color:red"></span>
						</div>
						</div>
						<div class="col-md-3">
							<label>State</label>
						<div class="key">
							<input  type="text"  name="state" required=""  placeholder="State" value="<?php echo $state; ?>">
							<div class="clearfix"></div>
						</div>
						</div>
						<div class="col-md-3">
							<label>Pincode</label>
						<div class="key">
							<input  type="number"  id="pin" name="pincode" required=""  placeholder="Pincode" value="<?php echo $pincode; ?>" onkeyup="Validatepinno();">
							<div class="clearfix"></div>
							<span id="lblErrorpino" style="color: red"></span>
						</div>
						</div>
						<div class="col-md-3">
							<label>Contact No.</label>
						<div class="key">
							<input  type="number"  name="contact" id="contact" required=""  placeholder="Contact No." value="<?php echo $contact; ?>" onkeyup="Validatephno();">
						
							<div class="clearfix"></div>
							<span id="lblErrorpno" style="color: red"></span>
							
						</div>
						</div>
						<div class="col-md-3">
							<label>Email Id</label>
						<div class="key">
							<input  type="email" onkeyup="ValidateEmail();" name="email" id="email" required=""  placeholder="Email Id" value="<?php echo $email; ?>">
							<div class="clearfix"></div>
                             <span id="lblError1" style="color:red"></span>
						</div>
						</div>
						<div class="col-md-3">
							<label>Pay type</label>
						 
							<div class="key1">
							<br/>
						<input type="radio" name="type" onclick="debit()" value="Debit Card" checked />Debit Card
						&nbsp;<input type="radio" name="type"  onclick="credit()" value="Credit Card" />Credit Card 
						&nbsp;<input type="radio" name="type"  onclick="cash()" value="Cash On Delivery" />Cash On Delivery
							<div class="clearfix"></div>
						</div>
						</div>
						<div id="cash">
						<div class="col-md-3">
							<label>Card Number</label>
						<div class="key">
							<input  type="number"  name="cardno" id="cardno"  placeholder="Card Number" onkeyup="Validatecardno();">
							<div class="clearfix"></div>
							<span id="lblErrorcno" style="color: red"></span>
							
						</div>
						</div>
						<div class="col-md-2">
							<label>CVV</label>
							<div class="key">
								<input type="password"  name="cvv"  id="cv" placeholder="CVV"  onkeyup="ValidateCVV();">
								<div class="clearfix"></div>
							<span id="lblErrorcvv" style="color: red"></span>
							</div>
						</div>
						<div class="col-md-2">
							<label>Card Exp. Month</label>
						<div class="key">
							<select name="month" id="month">
							 <option value="0" disabled selected style="display:none;">--Select--</option>
							<option disabled>1</option>
							<option disabled>2</option>
							<option disabled>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							</select>
							
							<div class="clearfix"></div>
						</div>
						</div>
						<div class="col-md-2">
							<label>Card Exp. Year</label>
						<div class="key">
							<select name="year" id="year">
							 <option value="0" disabled selected style="display:none;">--Select--</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							</select>
							<div class="clearfix"></div>
						</div>
						</div>
						</div>
						<div class="col-md-3">
						&nbsp;
						</div>
						<div class="col-md-4" align="center">
							 <input type="submit" name="checkout" Value="Checkout" class="btn btn-info btn-fill" onclick="return validatecard(month.value,year.value)">
							<div class="clearfix"></div>
						</div>
						</div>
					</form>
					<script>
					function cash(){
						$('#cash').hide();
					}
					function debit(){
						$('#cash').show();
					}
					function credit(){
						$('#cash').show();
					}
					function ValidateName(){
	//alert();
	var name = document.getElementById("aname").value;
	//alert(name);
	var lblError = document.getElementById("lblError");
	lblError.innerHTML = "";
	var expr = /^[a-zA-Z]*$/;
	if(!expr.test(name)) {
		lblError.innerHTML = "Invalid name";
	}
}
function ValidateEmail(){
	//alert();
	var name = document.getElementById("email").value;
	//alert(name);
	var lblError = document.getElementById("lblError1");
	lblError.innerHTML = "";
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if(!expr.test(name)) {
		lblError.innerHTML = "Invalid email address";
	}
}

function Validatephno() {
//alert();
var name = document.getElementById("contact").value;
var lblError = document.getElementById("lblErrorpno");
lblError.innerHTML = "";
var expr = /^\d{10}$/;
if (!expr.test(name)) {
	lblError.innerHTML = "Invalid phone no.";
}
}
function Validatecardno() {
//alert();
var name = document.getElementById("cardno").value;
var lblError = document.getElementById("lblErrorcno");
lblError.innerHTML = "";
var expr = /^\d{16}$/;
if (!expr.test(name)) {
	lblError.innerHTML = "Invalid card no.";
}
}
function Validatecity(){
	//alert();
	var name = document.getElementById("city").value;
	//alert(name);
	var lblError = document.getElementById("lblErrorcity");
	lblError.innerHTML = "";
	var expr = /^[a-zA-Z]*$/;
	if(!expr.test(name)) {
		lblError.innerHTML = "Invalid city";
	}
}
function Validatepinno() {
//alert();
var name = document.getElementById("pin").value;
var lblError = document.getElementById("lblErrorpino");
lblError.innerHTML = "";
var expr = /^\d{6}$/;
if (!expr.test(name)) {
	lblError.innerHTML = "Invalid pin number.";
}
}




function ValidateCVV() {
//alert();
var name = document.getElementById("cv").value;
var lblError = document.getElementById("lblErrorcvv");
lblError.innerHTML = "";
var expr = /^\d{3}$/;
if (!expr.test(name)) {
	lblError.innerHTML = "Invalid cvv.";
}
}
					</script>