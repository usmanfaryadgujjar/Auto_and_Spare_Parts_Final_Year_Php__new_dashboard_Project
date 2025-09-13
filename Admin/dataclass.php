<?php 
session_start();
/**
 * 
 */
class adminlogins
{
	
	private $con;

	function __construct()
	{
		include_once("Database2.php");
		$db = new Database();
		$this->con = $db->connect();
	}

    
	public function loginAdmin($email, $password){
		$q = $this->con->query("SELECT * FROM admin WHERE email = '$email' and seller_or_admin='admin' LIMIT 1");
		if ($q->num_rows > 0) {
			$row = $q->fetch_assoc();
			if (password_verify($password, $row['password'])) {
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['admin_id'] = $row['id'];
				return ['status'=> 202, 'message'=> 'Login Successful'];
			}else{
				return ['status'=> 303, 'message'=> 'Login Fail'];
			}
		}else{
			return ['status'=> 303, 'message'=> 'Account not created This email'];
		}
	}

}

if (isset($_POST['admin_login'])) {
	extract($_POST);
	if (!empty($email) && !empty($password)) {
		$c = new adminlogins();
		$result = $c->loginAdmin($email, $password);
		echo json_encode($result);
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}
}


?>