<?php 

if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}


?>


<div class="row">
    <?php
    
include "../db2.php";
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

    $_SESSIO =$_SESSION['admin_id'];
    
    $Totalseller=0;
                    $data2 = "SELECT * FROM products where 	pro_user_add_id='$_SESSIO' ";
					$view2 = mysqli_query($con,$data2);
					while($_view2 = mysqli_fetch_assoc($view2))
					{		
                        $Totalseller++;
                    }
    
    
                        
					?>
    
                      <div class="col-md-3">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:#3BAFDA; font-size:20px;" ><b style="margin-left:20px;">Product</b></div>
                            </div>
                            <div class="infos">
                                <h4>Total Add Product: <?PHP echo $Totalseller;  ?></h4>
                                
                                  
                            </div>
                          </div>
                        </div>
                      </div>
     
                    
     

            
</div>
                 