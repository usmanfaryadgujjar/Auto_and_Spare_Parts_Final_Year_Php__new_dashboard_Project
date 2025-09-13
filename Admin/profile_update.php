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
        <div class="row row-offcanvas row-offcanvas-left">
         <!------------Navigation Left side bar --------->
            <?php //include'navigationLeft.php' ?>
            
            <!------------Body of Content Part --------->
            <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Admin Panel </h3>
              </div>
              <div class="panel-body">
                  <H2>
                      Profile Update
                  </H2>
                  
                  <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="pass_ad_back_message">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
                  <br>
                  
                  <form method="post" onsubmit="return false">
                        <?PHP
					// Id from List Page
                    require "../db2.php";
                
					$selecte_id = $_SESSION['admin_id'];
						//Step:02 Database Connection
						//include('db2/db2.php');
					$data = "SELECT * FROM admin WHERE id='$selecte_id'";
					$view = mysqli_query($con,$data);
					while($_view = mysqli_fetch_assoc($view))
					{		
				 //  $selected_id = $_view['Code'];
					?>
                        
						<div class="row">
							<div class="col-md-7">
								<label for="name">Name</label>
								<input type="text" id="name" name="name" value="<?PHP echo $_view['name'] ?>" class="form-control" required>
							</div>
							
						</div>
                        <br>
						<div class="row">
							<div class="col-md-7">
								<label for="email">Email</label>
								<input type="text" class="form-control" value="<?PHP echo $_view['email'] ?>" readonly>
							</div>
						</div>
                        <br>
						<div class="row">
							<div class="col-md-7">
								<label for="password">Password</label>
								<input type="password" id="password" name="password"class="form-control"  required>
							</div>
						</div>
						<br>
                      <div class="row" style="margin-left: auto; margin-right: auto;">
							<div class="col-md-7">
								<input  value="Confirm" type="button" id="Admin_pass_chang" class="btn btn-success">
							</div>
						</div>
						
					<?php } ?>
					</form>
				
                  
                  
                  
              </div>
            </div>
        </div>
            
            
      </div>
    </div>
    
    <script>
    
        $(document).ready(function(){

     $("#Admin_pass_chang").click(function(event){
		event.preventDefault();
			$.ajax({
			url		:	"profile_Admin_pass_change_verfi.php",
			method	:	"POST",
			data	:	$("form").serialize(),
			success	:	function(data){ 
				$("#pass_ad_back_message").html(data);
			}
		})
		
	})
   
        })
        
    </script>
    </body>
</html>
           