    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<style>

    .gradl2 {
 background-image: linear-gradient(to right, powderblue ,lightblue ,lightskyblue,powderblue ,lightblue ,lightskyblue);
        }
    
    
    
</style>
<body class="gradl2">
<div class="container ">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
            <div class="section" id="square">
      
      <div class="column">
        <img class="circular--square" src="" alt="" />
      </div>

    </div>

			<h2 class="row justify-content-center"><b>Admin Login</b></h2>
            
			<p class="message"></p>
			<form id="admin-login-form">
			  <div class="form-group">
			    <label for="email">Email Address</label>
			    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			  <input type="hidden" name="admin_login" value="1">
			  <button type="button" class="btn btn-primary login-btn">Submit</button>
			</form>
		</div>
	</div>
</div>
    <div class="container">
        <hr>
        <div class="row justify-content-center" >
            
       <a href="../index.php">
       <button  class="btn outline-secondary" style="float:left; margin-left:50px;">Goto Home Page</button>
       </a>
    </div>
        <hr>
    </div>
    
    
    
</body>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
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
   
    
	
	$(".login-btn").on("click", function(){

		$.ajax({
			url : 'dataclass.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					//$("#admin-register-form").trigger("reset");
					window.location.href ="index.php";
				}else if(resp.status == 303){
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
				}
			}
		});

	});

});



</script>
