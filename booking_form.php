<?php 
include('header4.php');
?>
<?php
include('sqlcon.php');
session_start();
error_reporting(0);
if($r_typeid=="")
{
   header('location:Login.php');
}
$sql= mysqli_query($con,"SELECT * FROM user where email_id='{$_SESSION['email_id']}' "); 
while($row=mysqli_fetch_array($sql))
{
   $name=$row['full_name'];
   $email_id=$row['email_id'];
   $mobile=$row['contact_no'];
  $address=$row['address'];

}
$id=$_GET['r_typeid'];
$sql= mysqli_query($con,"SELECT * FROM room_category where r_typeid='$id' "); 
while($row=mysqli_fetch_array($sql))
{
   $type=$row['type'];
}
//print_r($result);

if(isset($_POST['submit']))
{
	
$sql=mysqli_query($con,"select * FROM room_category where type='$type'");
$res=mysqli_fetch_assoc($sql);
$total=$res['total'];
$booked=$res['booked']+1;
$available=$total-$booked;

if($res['available']!=0)
{
  $sql= mysqli_query($con,"select * from room_book where room_no='Active' ");
  if(mysqli_num_rows($sql)) 
  {
  $msg= "<h1 style='color:red'>You have already booked this room</h1>";    
  }
  else
  {
   $name=$_POST['name'];
  $email_id=$_POST['email_id'];
  $mobile=$_POST['mobile'];
  $services=$_POST['services'];
  $servicesstring=implode(",",$services);
  $roomtype=$_POST['roomtype'];
  $checkindate=$_POST['checkindate'];
  $checkintime=$_POST['checkintime'];
  $checkoutdate=$_POST['checkoutdate'];
  $occupancy=$_POST['occupancy'];
 
  }
   $sql="insert into room_book(name,email_id,mobile,address,services,roomtype,checkindate,checkintime,checkoutdate,occupancy) 
  values('$name','$email_id','$mobile','$address','$servicesstring','$roomtype','$checkindate','$checkintime','$checkoutdate','$occupancy')";
  mysqli_query($con,$sql);
  
  $sql = "UPDATE `room_category` SET `booked`=$booked,`available`=$available,`total`=$total where type='$type'";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1>"; 
   }
}
else{
	echo "<script>alert('All Rooms are Full.Please check other room type or Please contact us!!!!');window.location='rooms.php';</script>>";
}
}
?>

<div class="container-fluid text-center"id="primary"><!--Primary Id-->
  <h1> BOOKING Form </h1><br>
  <div class="container">
    <div class="row">
      <?php echo @$msg; ?>
      <!--Form Containe Start Here-->
     <form class="form-horizontal" method="post">
       <div class="col-sm-6">
         <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Name :</h4></div>
                <div class="col-sm-8">
                 <input type="text" value="<?php echo $name; ?>" id="name" class="form-control" name="name" placeholder="Enter Your Frist Name"required readonly>
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Email :</h4></div>
          <div class="col-sm-8">
              <input type="email_id" value="<?php echo $email_id; ?>"  class="form-control" name="email_id"  placeholder="Enter Your Email-Id"required readonly/>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Mobile :</h4></div>
          <div class="col-sm-8">
              <input type="number" value="<?php echo $mobile; ?>"  class="form-control" name="mobile" placeholder="Type Your Phone Number"required readonly/>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Address :</h4></div>
          <div class="col-sm-8">
              <textarea name="address" class="form-control" placeholder="Enter Your Address" readonly/><?php echo $address;  ?></textarea>
          </div>
        </div>
        </div>

<div class="form-group">
  <div class="control-label col-sm-4"><h4>Services :</h4></div>
  
  <input type="checkbox" id="services" name="services[]" value="Cab">
  <label for="cab"> Cab</label>&emsp;
  <input type="checkbox" id="services" name="services[]" value="food">
  <label for="food"> Food</label>&emsp;
  <input type="checkbox" id="services" name="services[]" value="loundry">
  <label for="loundry"> Loundry</label><br>
</div>
</div>


<div class="col-sm-6">
  <div class="form-group">
    <div class="row">
      <div class="control-label col-sm-5"><h4>Room Type:</h4></div>
      <div class="col-sm-7">
        <input type="text" value="<?php echo $type; ?>"  placeholder="Select your room" class="form-control" name="roomtype"required readonly/>
          
     </div>
   </div>
 </div>
</div>
          

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="checkindate"  min="2020-08-25" class="form-control checkin"required>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="checkintime" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="checkoutdate" class="form-control"required>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="occupancy">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="occupancy"required >Single</div>

                  <div class="radio-inline"><input type="radio" value="dubble" name="occupancy" required>Dubble</div>
                </div> 
              </div>
            </div>
            <a href="sendmailer.php"><input type="submit"value="submit" name="submit" class="btn btn-primary"required/></a>
          </div>
          </form><br>
        </div>
      </div>
    </div>
  </div>
<?php
include('footer.php')
?>
</body>
</html>
