<?php
//include "db2\db2.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:Customer_profile.php");
exit; 
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php 
        include 'Head.php'; ?>
        
        
    </head>
    <body class="gradl">
        <?php include 'HeaderBar.php'; ?>   
       
       <p><br/></p>
	
        <div class="container-fluid ">
		<div class="row justify-content-center" >
			<div class="col-md-4"></div>
			<div class="col-md-4">

					
                     <h1 ><center><b>Forgotten Password</b></center></h1>
		              <hr>
                        <div id="forgt_back_message"></div>
						<form method="post" onsubmit="return false">
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email"class="form-control" required>
							</div>
						</div>
                    	<p><br/></p>
                        <hr>
						<div class="row" style="float:right;">
							<div class="col-md-12">
								<input  value="submit" type="button" id="forgott" name="Submit" class="btn btn-success btn-lg">
							</div>
						</div>
						
					
					</form>
			
		</div>
		<div class="col-md-4"></div>
	</div>
    </div>
        
    </body>