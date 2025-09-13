<!-- Bootstrap core CSS ------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="../Asset/fontawesome-free-5.13.1-web/css/all.css" rel="stylesheet">

<style>

    .gradl2 {
 background-image: linear-gradient(to right, powderblue ,lightblue ,lightskyblue,powderblue ,lightblue ,lightskyblue);
        }
   
    
</style>
<body class="gradl2">
<div class="container ">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
            <div class="section"  id="square">
      
      
    </div>

            <h1 class="row justify-content-center"><b>Sign In</b></h1>
            
			<p class="message"></p>
            
            
			<form id="admin-login-form">
			  <div class="form-group">
                
                  <label for="email" >Email Address</label>
			    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email">
			   
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			  <input type="hidden" name="admin_login" value="1">
                <div class="row justify-content-center">
			  <button type="button" class="btn btn-primary btn-lg login-btn  ">Log in</button>
                </div>
			</form>
		</div>
	</div>
</div>
    
    <div class="container">
        <hr>
        <div class="row justify-content-center" >
            <!--------
       <a href="../Admin/index.php">
       <button  class="btn btn-outline-primary" style="float:left; margin-left:50px;">Only Admin Login Click Here</button>
       </a>
            --------------->
       <a href="../index.php">
       <button  class="btn outline-secondary" >Goto Home Page</button>
       </a>
    </div>
        <hr>
    </div>
    
</body>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
<script>
$(document).ready(function(){

	
	$(".login-btn").on("click", function(){

		$.ajax({
			url : 'dataclass.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 201) {
					window.location.href ="index.php";
				}
                else if(resp.status == 202) {
					window.location.href ="../Admin/index.php";
				}
                else if(resp.status == 203) {
					window.location.href ="../Manager/index.php";
				}
                else if(resp.status == 303){
					$(".message").html('<hr><div class="alert alert-warning" role="alert"><blink><span class="text-danger">'+resp.message+'</span></blink></div><hr>');
				}
			}
		});

	});

});


</script>
