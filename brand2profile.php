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
   <body >
      
      <!---header bar---->
       
        <?php include 'HeaderBar_profile.php'; ?>   
    
        
        <div class="my1di">
<div class="container-fluid">
    <br>
    <div class="my1di">
    <h3>Brands</h3>
    </div>
    <br>
		<div class="row">
    		<div class="col-md-13 col-xs-12">
                
				<div class="row">
                    <div class="col-md-3"></div>
					<div class="col-md-6 " id="product_msg">
					</div>
				</div>
                <div class="panel-body">
                    <div class="col-md-1 col-xs-6" >
						<div id="get_brand_all" >
				</div>
                    </div>
                    
						<div id="get_product">
							
						</div>
						
                    
                </div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
    
	</div><br>
</div>

       
        
        
       <?php include 'Footer.php'; ?>
       
    
    </body>
</html>