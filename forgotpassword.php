
<?php 



 session_start();

 ?>

    <!--modal-->
    <form action="reset_password.php" method="Post">
<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
         
          <h1 class="text-center" >What's My Password?</h1>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p>If you have forgotten your password you can reset it here.</p>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address" name="email" id="email" type="email">
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>  
      </div>
  </div>
  </div>
</div>
</form>
  </body>
</html>

 
<?php
include('sqlcon.php');


if(isset($_POST['submit'])) {
  $email=$_POST['email_id'];


  $query=mysqli_query($con, "select * from user where email_id='$email'");
  
  if($query)
   {
  if(mysqli_num_rows($query)>0) 
    {
   echo $_SESSION['email_id']=$email;
   header('location:index.php');
    }
else{
   echo "<script>alert('Email or password is incorrect, Please try again')</script>"; 
}
} 
}
?>