<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}


?>

<!DOCTYPE html>
<html>

    <head>
    <?php include'head.php' ?>
    
    </head>
<body>
<!------------Nav bar top --------->
            <?php include'headerNavbar.php' ?>
<div class="container-fluid">
        <div class="row ">
         <!------------Navigation Left side bar --------->
            <?php //include'navigationLeft.php' ?>
            
            <!------------Body of Content Part --------->
            <div class="col-xs-12 col-sm-15 content">
            <div class="panel panel-default">
              <div class="panel-heading">       <!--------fa fa-angle-double-left------->
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="" data-toggle="offcanvas" title="Maximize Panel"></span></a>Profile Edit For Seller </h3>
              </div>
              <div class="panel-body">
                  <div class="container-fluid gradl">
		              
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
                    <div class="row">
			<div class="col-md-8" id="seller_pass_back_message">
				<!--Alert from signup form-->
			</div>
			<br>
		</div>
        
					<div class="panel-heading"> Profile Update </div>
					
					
					<form method="post" onsubmit="return false">
                        <?PHP
					// Id from List Page
                        
                       include "../db2.php";
                  
        $selecte_id = $_SESSION['admin_id'];
        
						//Step:02 Database Connection
						//include('db2/db2.php');
					$data = "SELECT * FROM user_info WHERE user_id='$selecte_id'";
					$view = mysqli_query($con,$data);
					while($_view = mysqli_fetch_assoc($view))
					{		
				 //  $selected_id = $_view['Code'];
					?>
                        <br>
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" value="<?PHP echo $_view['first_name'] ?>" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<input type="text" id="l_name" name="l_name" value="<?PHP echo $_view['last_name'] ?>"class="form-control">
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email <small>**</small></label>
								<input type="text" id="email" name="email"class="form-control" value="<?PHP echo $_view['email'] ?>" readonly>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type="password" id="password" name="password"class="form-control"  required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="mobile" name="mobile"class="form-control" value="<?PHP echo $_view['mobile'] ?>" required>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address </label>
								<input type="text" id="address1" name="address1" value="<?PHP echo $_view['address1'] ?>" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Address <small>Optional</small></label>
								<input type="text" id="address2" name="address2" value="<?PHP echo $_view['address2'] ?>"  class="form-control">
							</div>
						</div>
                             <hr>
                        <div class="row">
							<div class="col-md-12">
								<label for="cnic">CNIC <small>**</small></label>
								<input type="text" id="cnic" name="cnic" value="<?PHP echo $_view['cnic'] ?>" class="form-control" readonly>
							</div>
						</div>
                   
                        <hr>
                        <div class="row">
							<div class="col-md-12">
								<label for="user_type">User Type <small>**</small> </label>
								<input type="text"  value="<?PHP echo $_view['user_type'] ?>"  class="form-control" readonly >
							</div>
						</div>
                        
                        <p><br/></p>
                        <hr>
						<div class="row" style="margin-left: auto; margin-right: auto;">
							<div class="col-md-12">
								<input  value="Confirm" type="button" onclick="topFunction()" id="seller_pass_chang" name="signup_button"class="btn btn-success btn-lg">
							</div>
                            <small>** Your changing Please Contact To Admin</small>
						</div>
						
					<?php } ?>
					</form>
				
                    
                    

				</div>
			</div>
		
		</div>
	</div>
</div>
        
                  
                  
                  
              </div>
            </div>
        </div>
            
            
      </div>
    
    
    
        <script>
    
        $(document).ready(function(){
            
  
    
            

     $("#seller_pass_chang").click(function(event){
		event.preventDefault();
			$.ajax({
			url		:	"profile_update_Verf.php",
			method	:	"POST",
			data	:	$("form").serialize(),
			success	:	function(data){ 
				$("#seller_pass_back_message").html(data);
			}
		})
		
	})
   
        })
            
            
function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
} 
        
    </script>

    
    </body>
</html>
           