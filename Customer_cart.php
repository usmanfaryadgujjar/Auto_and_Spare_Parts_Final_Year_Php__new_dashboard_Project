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
       
       
        <!---header bar---->
       
        <?php 
       //include 'HeaderBar_profile.php';
       if(isset($_SESSION["uid"])){
           include 'HeaderBar_profile.php';
        }else
       {
           include 'HeaderBar.php';
       }

       
       ?>   
       
       
       
       
       <!-------Product show it edit card ------>
       <p><br/></p>
    
	
       <div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
           <!-------
            <div class="col-md-8" id="c_order_msg">
				 
			</div>
            -------->
            
            
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary ">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body gradl">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
                            <div class="col-md-2 col-xs-2"><b>Total Price </b></div>
                            <div class="col-md-2 col-xs-2"><b>Drop / Update</b></div>
							
						</div>
						<div id="cart_checkout" class="gradl"></div>
					
                    </div> 
					</div>
					
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>

<script>var CURRENCY ='Rs'; </script>
    
    
       
       <!--------------end of product card-----> 
       <?php include 'MainProductBody.php'; ?>
      
       
        <?php include 'ShopTopSliderCard.php'; ?>
       
       
       
       
       <?php include 'Footer.php'; ?>
       
   
       
    </body>
</html>