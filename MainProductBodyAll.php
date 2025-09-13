

<!DOCTYPE html>
<html lang="en">
	<head>
        
		<?php include 'Head.php'; ?>
        
    </head>
   <body class="gradl">
      
        <?php 
         session_start();
       if(!isset($_SESSION["uid"])){

            include 'HeaderBar.php';
            }
       else if (isset($_SESSION["uid"])){
           include 'HeaderBar_profile.php';
       }
       
       ?>
       
       
       <div class="row">
 <div class="" style="margin-left:30px; margin-right:30px;">
				<div class="row">
					<div class="col-md-6 col-xs-6" id="product_msg">
					</div>
				</div>
		
     <div class="text-center">
					
    <?php
             include "db2.php";
         
	$product_query2 = "SELECT * FROM products ";
	$run_query2 = mysqli_query($con,$product_query2);
	if(mysqli_num_rows($run_query2) > 0){
		while($roww = mysqli_fetch_array($run_query2)){
			$pro_id    = $roww['product_id'];
			$pro_cat   = $roww['product_cat'];
			$pro_brand = $roww['product_brand'];
			$pro_title = $roww['product_title'];
			$pro_price = $roww['product_price'];
			$pro_image = $roww['product_image'];
			$product_desc = $roww['product_desc'];
                        
             $su=($pro_price * 5)/100;
            $per=$su+$pro_price;

                        
                        ?>
                        
			
				<div class='col-md-3 c'>
							<div class='panel panel-info'>
								<div class='panel-body'>
									<img src='Image_Product/<?php echo $pro_image ?>' style='width:140px; height:200px;'/>
								</div>
								<div class='panel-heading'>
                                    <h3><b><?php echo $pro_title; ?></b></h3>
                                      <p style="height:100px;"><small><?php echo $product_desc; ?></small></p><br>
                                    <h3><b>Rs <?php echo $pro_price; ?> </b><blink><span><del><small style="color:red;">Rs <?php echo $per; ?></small></del></span></blink></h3><br>
									<button pid="<?php echo $pro_id; ?>"  id="product" class="btn btn-primary">Add To Cart </button><hr>
                                    
                                    <div class='row'>
                                    </div>
                                </div>
							</div>
						</div>

            
            <?php    } }   ?>
                    </div>
					
       
       </div>
   </div>
       
       
       
       
       
       <?php include 'Footer.php'; ?>
       
       
    
    </body>
</html>



