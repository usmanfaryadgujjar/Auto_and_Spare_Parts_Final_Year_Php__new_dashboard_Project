

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'Head.php'; ?>
        
    </head>
   <body>
       <?php include 'HeaderBar.php'; ?>
    
        <div class="container-fluid gradl">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_back_message">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Registration Form</div>
					<div class="panel-body">
					
					<form method="post" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<input type="text" id="l_name" name="l_name"class="form-control">
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email"class="form-control" required>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type="password" id="password" name="password"class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter Password</label>
								<input type="password" id="repassword" name="repassword"class="form-control" required>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="mobile" name="mobile"class="form-control" required>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address</label>
								<input type="text" id="address1" name="address1"class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <label for="address2">Address <small>(Optional)</small></label>
								<input type="text" id="address2" name="address2"class="form-control">
							</div>
						</div>
                        <hr>
                        <div class="row">
							<div class="col-md-12">
								<label for="cnic">CNIC No</label>
								<input type="text" id="cnic" name="cnic"class="form-control">
							</div>
						</div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="user_type">Select Option Only One</label>
                            <div class="form-group"  >
                                        <div class="radio">
                                          <label>
                                            <input type="radio"  id="customer" name="user_type" value="customer" required>
                                            Customer
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio"  id="seller" name="user_type" value="seller" required>
                                            Seller
                                          </label>
                                        </div>
                                 </div>
                            </div></div>
						<p><br/></p>
                        <hr>
						<div class="row" style="margin-left: auto; margin-right: auto;">
							<div class="col-md-12">
								<input  value="Sign Up" type="button" onclick="topFunction()" id="Reg_form" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>
						
					
					</form>
				
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
       
       <script>
       
           function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
           
       </script>
       
    </body>
    
</html>