<?php
session_start();
include "../db2.php";
$_SESSION = $_SESSION['admin_id'];
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
    $name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
    
    
if(empty($f_name) || empty($l_name)  || empty($password) ||
	empty($mobile) || empty($address1) ){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
    
    if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div> <br>
		";
		exit();
	}
    if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 11)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 11 digit</b><i><strong>For Example : 03XXXXXXXXX </strong></i>
			</div>
		";
		exit();
	}
		
    
    $password5 = md5($password);
     $password2 = password_hash ($password, PASSWORD_BCRYPT, ["COST"=> 8]);
    
    
     $data3 = "SELECT * FROM admin where seller_id='$_SESSION' ";
					$view3 = mysqli_query($con,$data3);
					while($_view3 = mysqli_fetch_assoc($view3))
					{		
                        $pro_i    = $_view3 ['seller_id'];
                        
                    }
   
    if($_SESSION==$pro_i){
    
		$sql = "UPDATE user_info SET first_name='$f_name', last_name='$l_name', password='$password2', mobile='$mobile', address1='$address1', address2='$address2' Where user_id='$_SESSION' and user_type ='seller' ";
		if(mysqli_query($con,$sql))
        {
			echo "
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Your Account is Successfully Update</b>
			</div>
            ";
			//exit();
            
            $sql = "UPDATE admin SET name='$f_name', password='$password2' Where id='$_SESSION' and seller_or_admin='seller' ";
		if(mysqli_query($con,$sql)){
			echo "
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Your Account is Successfully Update --- <a> Message by Main_Manager</a> </b>
			</div>
            ";
			exit();
		              }

		}
        else
        {
            echo "
            <div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Your Account is not Update <i>err117</i></b>
			</div>
            ";
			exit();
    
            
        }
	
    
    }
    else
    {
    
         echo "
            <div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b> Your Account is not Update</b>
			</div>
            ";
			exit();
       
    }
    
    
    
	}
}



?>