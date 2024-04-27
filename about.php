
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


<?php 
include("header2.php");
?>
		

    <!-- bradcam_area_start -->
  
    
        <div class="core-slider_item">
                  <img src="images/img2.jpg" class="img-responsive" alt="" height="500" width="1450">
              </div><br/>
    
    <!-- bradcam_area_end -->
     <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            
                            <h2 class="tittle">A Luxuries Hotel with Nature</h2>
                        </div><br/>
                        <p><i>A Luxury Hotel is considered a hotel which provides a <br/>luxurious accommodation experience to the guest...<br/>Often 4 or 5 star hotels describe themselves as 'luxury'.<br/> Here is a selection of characteristics a luxury hotel should feature :- Allow an easy, simple and intelligent planning and booking process.</i></p>
                       
                    </div>
                </div>
                <div class="col-sm-4">
          
                        <div class="img_1">
                            <br/><img src="images/about_1.png" alt="" height="300" width="350"><br/>
                    
						</div>
						</div>
					<div class="col-sm-4">
                  
                        <div class="img_1">	
                        
                           <br/> <img src="images/about_2.png" alt="" height="300"  width="350"><br/>
                        
                    
                    </div>
                </div>
           
        </div>
    </div>



   <br/> <div class="banner-w3">
      <div class="demo-1">            
        <div id="example1" class="core-slider core-slider__carousel example_1">
          <div class="core-slider_viewport">
            <div class="core-slider_list">
              <div class="core-slider_item">
                <img src="images/hotels.jpg" class="img-responsive" alt="">
              </div>
               <div class="core-slider_item">
                 <img src="images/w2.jpg" class="img-responsive" alt="" width="5000">
               </div>
              <div class="core-slider_item">
                  <img src="images/5.jpg" class="img-responsive" alt="" width="4000">
              </div>
             </div>
          </div>
                    
                      <div class="core-slider_nav">
            <div class="core-slider_arrow core-slider_arrow__right"></div>
            <div class="core-slider_arrow core-slider_arrow__left"></div>
          </div>
          <div class="core-slider_control-nav"></div>
        </div>
      </div>
      <link href="css/coreSlider.css" rel="stylesheet" type="text/css">
      <script src="js/coreSlider.js"></script>
      <script>
      $('#example1').coreSlider({
        pauseOnHover: false,
        interval: 3000,
        controlNavEnabled: true
      });

      </script>

       <div class="about_area">
        <div class="container">
            <div class="row">
                
				
				
				<div class="col-sm-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            
                             <h2 class="tittle">We Serve Fresh and <br>
                        </div><br/>
                       <p><i>Indian food is different from rest of the world not only in a taste  but also in cooking method. It reflects perfect blend of various cultures and ages. </br>Foods of india are better known for its spiciness. Throughtout India, be it North India or South India, spices are used generously in food . But one must not forget that every single spice used in Indian dishes carries some or the other nutritional as well as medicinal properties.</i></p>
                       
                    </div>
                </div>
                <div class="col-sm-4">
          
                        <div class="img_1">
                            <br/><img src="images/f1.jfif" alt="" height="300" width="350"><br/>
                    
						</div>
						</div>
					<div class="col-sm-3">
                  
                        <div class="img_1">	
                        
                           <br/> <img src="images/f2.jfif" alt="" height="300" width="350"><br/>
                        
                    
                    </div>
                </div>
				
				
				<br/>
				<br/>
	
            
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <br/>
                            <h2 class="tittle">The Best & Afforable</br>Cab Services   </h2>
                        </div><br/>
                        <p><i>The perfect way to get through our everyday travel needs. City tex are available 24/7 and you can travel in an instant.   we can choose from a wide range of options! </br> For a faster travel experience we have share express on some fixed routes with zero deviations . Choose your ride and zoom away!</i></p>
                       
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex">
                        <div class="img_1">
                            
                        
                        
                           <br/> <img src="images/cab4.jpg" alt="" height="200">
                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div><br/>

<section class="ban-bottom-w3l" id="section-events">
        <div class="container">
         
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">People Says</h2>
              
            </div>
          </div>
          <div class="row">
		  
		  <?php 
		  include("sqlcon.php");
		  $sql=mysqli_query($con,"select * from feedback");
while($res=mysqli_fetch_assoc($sql))
{
	
	?>
      
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mt20" data-aos="fade-up" data-aos-delay="200">
              <div class="media media-custom d-block mb-4 h-100">
                <div class="media-body">
                  
                  <p>"Good stay compared to all other hotels in udupi. Free room service but chances for the food. A/c rooms are very good.Well furnished rooms.located near the temple"</p>-->
				 <p><?php echo $res['feedback'];?></p>
<h4><em>&mdash; <?php echo $res['name'];?></em></h4>
<?php 
for($i=0;$i<$res['star'];$i++)
{
	?>
<i class="fa fa-star" aria-hidden="true"></i>
<?php
}
?>

                </div>
              </div>
            </div>
<?php
}
?>
			
			
		
		
           
          </div>
		
        </div>
      </section>
  




<?php 
include("footer.php");
?>    
</body>

</html>