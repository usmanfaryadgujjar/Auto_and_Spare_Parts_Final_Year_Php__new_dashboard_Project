<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'Head.php'; ?>
        
    </head>
   <body>
       
<div class="wait overlay">
	<div class="loader"></div>
</div>
   
       <!---header bar---->
       
        <?php include 'HeaderBar_profile.php'; ?>   
   
       
       
       
       <!-------header bar end--------------->
       
        <?php include 'MainPageSlider.php'; ?>
      <br> 
      
       <?php include 'MainProductBody.php'; ?>
      
       
        <?php include 'ShopTopSliderCard.php'; ?>
       
       
       
       <?php include 'ShopTopSliderCard2nd.php'; ?>
       
       <?php include 'Footer.php'; ?>
       
    
    </body>
</html>