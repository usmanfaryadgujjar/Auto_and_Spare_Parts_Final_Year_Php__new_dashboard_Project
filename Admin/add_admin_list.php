<?php 


if(isset($_POST["operation_admin"]))
{
	if($_POST["operation_admin"] == "Add_admin")
	{
	    $name = $_POST["ad_name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $cni = $_POST["cnic"];
        
		if(!empty($name) && !empty($email) && !empty($pass) && !empty($cni) )
		{
            
           include('../db2.php');
 
            $password_h2 = password_hash($pass, PASSWORD_BCRYPT, ["COST"=> 8]);
            
            
            $sql = "INSERT INTO `admin`(`name`, `email`, `password`, `seller_or_admin`, `cnic`, `seller_id`) VALUES ('$name', '$email', '$password_h2','admin','$cni','0')";
            
            $run_query = mysqli_query($con,$sql);
           if(!empty($run_query))
           {
            echo 'Data Inserted';   
           }
            else
            {
              echo 'Not Insert Data Error of sql ';  
            }
			
		}
        else
        {
            echo 'Data Not Inserted Please Check Out Complete Fill';
            
        }
	}
    
}

?>
