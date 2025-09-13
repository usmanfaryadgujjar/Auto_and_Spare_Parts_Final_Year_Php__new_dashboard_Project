<?php
//include "db2\db2.php";
session_start();
if(isset($_SESSION["uid"])){

    header("location:Customer_profile.php");
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
        
		<?php include 'Head.php'; ?>
        
    </head>
   <body>
      
        <?php include 'HeaderBar.php'; ?>   
       
        <?php include 'MainPageSlider.php'; ?>
      <br> 
      
       <?php include 'MainProductBody.php'; ?>
      
       
        <?php include 'ShopTopSliderCard.php'; ?>
        <?php //include 'SliderProduct.php'; ?>
       
       
       
       <?php include 'ShopTopSliderCard2nd.php'; ?>
       
       
       <?php //include 'MainProductBody2-30.php'; ?>
       
       
       <?php include 'Footer.php'; ?>
       
    
    </body>
</html>