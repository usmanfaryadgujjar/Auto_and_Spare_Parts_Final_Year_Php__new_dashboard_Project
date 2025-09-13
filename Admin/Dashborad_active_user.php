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

    $Totalsellercustomer=0;
                    
                    $data = "SELECT * FROM user_info ";
					$view = mysqli_query($con,$data);
					while($_view = mysqli_fetch_assoc($view))
					{		
                        $Totalsellercustomer++;
                    }
    
    $Totalseller=0;
                    $data2 = "SELECT * FROM user_info where user_type='seller' ";
					$view2 = mysqli_query($con,$data2);
					while($_view2 = mysqli_fetch_assoc($view2))
					{		
                        $Totalseller++;
                    }
    
    $TotalsellerActive=0;
                    $data3 = "SELECT * FROM admin where seller_or_admin='seller' ";
					$view3 = mysqli_query($con,$data3);
					while($_view3 = mysqli_fetch_assoc($view3))
					{		
                        $TotalsellerActive++;
                    }
    
    $TotalsellerDisactive=$Totalseller-$TotalsellerActive;
                    
    
    $TotalCustomer=0;
                    $data5 = "SELECT * FROM user_info where user_type='customer' ";
					$view5 = mysqli_query($con,$data5);
					while($_view5 = mysqli_fetch_assoc($view5))
					{		
                        $TotalCustomer++;
                    }
    
    $TotalAdmin=0;
                    $data6 = "SELECT * FROM admin where seller_or_admin='admin' ";
					$view6 = mysqli_query($con,$data6);
					while($_view6 = mysqli_fetch_assoc($view6))
					{		
                        $TotalAdmin++;
                    
                    }
                    
    
    $TotalManager=0;
                    $data7 = "SELECT * FROM admin where seller_or_admin='manager' ";
					$view7 = mysqli_query($con,$data7);
					while($_view7 = mysqli_fetch_assoc($view7))
					{		
                        $TotalManager++;
                    
                    }
    
    
    
                        
					?>
    
                      <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix justify-content-center">
                                <div style="background-color:#5D9CEC; font-size:20px;" ><b style="margin-left:22px;">User</b></div>
                            </div>
                            <div class="infos">
                                
                              <h4><p>Customer & Seller </p>G.Total: <?PHP echo $Totalsellercustomer;  ?></h4>
                             
                            </div>
                          </div>
                        </div>
                      </div>
     
                      <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:#3BAFDA; font-size:20px;" ><b style="margin-left:20px;"> Saller</b></div>
                            </div>
                            <div class="infos">
                                <h4>G.Total : <?PHP echo $Totalseller;  ?></h4>
                                <h4>Active Total : <?PHP echo $TotalsellerActive;  ?></h4>
                                <h4>Disactive Total : <?PHP echo $TotalsellerDisactive;  ?></h4>
                                
                                  
                            </div>
                          </div>
                        </div>
                      </div>
     
                      <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                             <div style="background-color:#48CFAD; font-size:20px;" ><b style="margin-left:15px;" > Customer</b></div>
                             </div>
                            <div class="infos">
                                 <h4>Total : <?PHP echo $TotalCustomer;  ?></h4>
                            </div>
                          </div>
                        </div>
                      </div>
     
                       <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:#4A89DC; font-size:20px;" ><b style="margin-left:23px;"> Admin</b></div>
                            </div>
                            <div class="infos">
                                 <h4>Total : <?PHP echo $TotalAdmin;  ?></h4>
                            </div>
                          </div>
                        </div>
                      </div>
    
    
                        <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:#3BAFDA; font-size:20px;" ><b style="margin-left:23px;">Manager</b></div>
                            </div>
                            <div class="infos">
                                 <h4>Total : <?PHP echo $TotalManager;  ?></h4>
                            </div>
                          </div>
                        </div>
                      </div>
    
    
     
     <!--------------
                      <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:#5D9CEC; font-size:20px;" ><b style="margin-left:8px;"> Total Sale</b></div>
                              <div style="background-color:#4FC1E9" class="pull-left light"></div>
                              <div style="background-color:#3BAFDA" class="pull-right dark"></div>
                            </div>
                            <div class="infos">
                              <h4>AQUA</h4>
                              <p>#4FC1E9, #3BAFDA</p>
                            </div>
                          </div>
                        </div>
                      </div>
     
                      <div class="col-md-2">
                        <div class="color-swatches">
                          <div class="swatches">
                            <div class="clearfix">
                              <div style="background-color:#48CFAD" class="pull-left light"></div>
                              <div style="background-color:#37BC9B" class="pull-right dark"></div>
                            </div>
                            <div class="infos">
                              <h4>MINT</h4>
                              <p>#48CFAD, #37BC9B</p>
                            </div>
                          </div>
                        </div>
                      </div>
        ------------------>
     
     

            
</div>
                 