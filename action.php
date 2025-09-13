<?php
session_start();
$ip_add = getenv("Remote_Add_Cart");
include "db2/db2.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
/* all */
if(isset($_POST["brandall"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
    <div class='card' style='width: 10rem;'>
  <div class='card-body'>
  <ul class='list-group list-group-flush'>
  
  <li class='list-group-item'><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
  </ul></div></div>";
		}
		
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

if(isset($_POST["get3Product_main_page"])){
	$limit = 8;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$product_desc = $row['product_desc'];
            $su=($pro_price * 5)/100;
            $per=$su+$pro_price;
			echo "
				<div class='col-md-3 c'>
							<div class='panel panel-info'>
								<div class='panel-body'>
								<div class='row'>
									<img src='Image_Product/$pro_image' style='width:140px; height:180px;'/>
									</div>
								</div>
                                <div class='panel-heading'>
                                
                                <p><h3><b>$pro_title</b></h3></p>
                                <div class='row'>
                                 <p style=' float:left; height:100px;'><small>$product_desc</small><br></p>
                                 </div>
                                 <div class='row'>
                                 <br>
                                <h3><b>Rs $pro_price  </b><blink><span><del><small style='color:red;'>Rs $per</small></del></span></blink></h3>
                                </div>
                                <br> 
									<button pid='$pro_id'  id='product' class='btn btn-primary'>Add To Cart </button><hr>
									
                               <!------------    
                                   <br>
                                   
                                   <ul style='float:left; margin-left:42px;'>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star disable'></li>
                                        </li>
                                    </ul>
                                    <br>
                                    --------------->
                               
                                    
                                </div>
                                
							</div>
						</div>	
			";
		}
	}
}



if(isset($_POST["get30Product_main_page"])){
	$limit = 30;
	
	$product_query = "SELECT * FROM products where LIMIT $start,$limit ";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$product_desc = $row['product_desc'];
            $su=($pro_price * 5)/100;
            $per=$su+$pro_price;

			echo "
				<div class='col-md-3 c'>
							<div class='panel panel-info'>
								<div class='panel-body'>
									<img src='Image_Product/$pro_image' style='width:140px; height:180px;'/>
								</div>
                                <div class='panel-heading'>
                                <p><h3><b>$pro_title</b></h3></p>
                                 <p style='height:100px;'><small>$product_desc</small></p>
                                 
                                <h3><b>Rs $pro_price  </b><blink><span><del><small>Rs $per</small></del></span></blink></h3><br> 
									<button pid='$pro_id'  id='product' class='btn btn-primary'>Add To Cart </button><hr>
                               <!------------    
                                   <br>
                                   
                                   <ul style='float:left; margin-left:42px;'>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star disable'></li>
                                        </li>
                                    </ul>
                                    <br>
                                    --------------->
                               
                                    
                                </div>
                                
							</div>
						</div>	
			";
		}
	}
}



if(isset($_POST["searcha"])) {
		$keyword = $_POST["keyword"];
    
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'
        OR product_condition LIKE '%$keyword%'
        OR product_price LIKE '%$keyword%'
        OR product_title LIKE '%$keyword%'
        OR product_brand LIKE '%$keyword%'
        OR product_cat LIKE '%$keyword%'
        ";
        
    
    $C=0;
    
	$run_query = mysqli_query($con,$sql);
	while($rows=mysqli_fetch_array($run_query)){
    
        $C++;
        
    }
    
    if(empty($C))
    {
        echo"<div class='row'>
                    <div class='col-md-3'></div>
   <div class='alert alert-danger col-md-6 col-xs-6'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						 <b>Not Product Available This $keyword </b>
				</div></div>
				</div><br>
                "; 
   
    }
    
    
    if(!empty($C))
    {
        echo"<div class='row'>
                    <div class='col-md-3'></div>
   <div class='alert alert-success col-md-6 col-xs-6'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product Available This $keyword </b><br>
                        <b>Total Product $C</b>
				</div></div>
				</div><br>
                "; 
   
   
    }
   
	
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
        $product_desc = $row['product_desc'];
        $su=($pro_price * 5)/100;
            $per=$su+$pro_price;

       echo "
				<div class='col-md-3 c' style='margin-left:50px;'  >
							<div class='panel panel-info'>
								<div class='panel-body'>
									<img src='Image_Product/$pro_image' style='width:140px; height:180px;'/>
								</div>
                                <div class='panel-heading'>
                                <p><h3><b>$pro_title</b></h3></p>
                                 <div class='row'> 
                                 <p style=' float:left; height:60px;'><small>$product_desc</small></p>
                                 </div>
                                  <div class='row'> 
                                  <br>
                                <h3><b>Rs $pro_price  </b><blink><span><del><small style='color:red;' >Rs $per</small></del></span></blink></h3><br> 
                                </div>
									<button pid='$pro_id'  id='product' class='btn btn-primary'>Add To Cart </button><hr>
                               <!------------    
                                   <br>
                                   
                                   <ul style='float:left; margin-left:42px;'>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star disable'></li>
                                        </li>
                                    </ul>
                                    <br>
                                    --------------->
                               
                                    
                                </div>
                                
							</div>
						</div>	
			";
		}
    
     
    
}

if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}
    else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}
    
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
        $product_desc = $row['product_desc'];
        $su=($pro_price * 5)/100;
            $per=$su+$pro_price;

        
		echo "
				<div class='col-md-3 c' style='margin-left:50px;'  >
							<div class='panel panel-info'>
								<div class='panel-body'>
									<img src='Image_Product/$pro_image' style='width:140px; height:180px;'/>
								</div>
                                <div class='panel-heading'>
                                <p><h3><b>$pro_title</b></h3></p>
                                 <div class='row'> 
                                 <p style=' float:left; height:60px;'><small>$product_desc</small></p>
                                 </div>
                                  <div class='row'> 
                                  <br>
                                <h3><b>Rs $pro_price  </b><blink><span><del><small style='color:red;' >Rs $per</small></del></span></blink></h3><br> 
                                </div>
									<button pid='$pro_id'  id='product' class='btn btn-primary'>Add To Cart </button><hr>
                               <!------------    
                                   <br>
                                   
                                   <ul style='float:left; margin-left:42px;'>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star checked'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star'></li>
                                        <li class='fa fa-star disable'></li>
                                        </li>
                                    </ul>
                                    <br>
                                    --------------->
                               
                                    
                                </div>
                                
							</div>
						</div>	
			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

        if(isset($_SESSION["uid"]))
        {
        
        
		if(isset($_SESSION["uid"]))
        {

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added</b>
					</div>
				";
			}
		}
		}
        else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-danger'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully</b>
					</div>
				";
				exit();
			}
		}
		
            
        }
        else
        {
            echo "
					<div class='alert alert-danger ' >
							<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a>
							<b>Please First Login Your Account After Then Add Product To Cart  </b><small><b>
							<i><a href='Customer_login.php'><blink> Login Click Here </blink></a></i>  </b></small>
					</div>";
					exit();
            
            
        }
		
		
		
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="Image_Product/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">Rs'.$product_price.'</div>
					</div><hr>';
				
			}
			?>

				<a style="float:right;" href="Customer_cart.php" class="btn btn-primary">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			//echo "<form method='post' action='Customer_login.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<hr>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="Image_Product/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
                                <div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
							</div>';
				}
				
				echo '<div class="row">
                            <hr>
							<div class="col-md-9"></div>
							<div class="col-md-3">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '<br><hr><br><input type="submit" style="float:right; margin-right:15px; background-color:#0f53bf;" name="login_user_with_product" class="btn btn-info btn-xl" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					// checkout form of account 
					
							  
							echo   
								'</form><br><hr>
                                <form action="" method="post">
                                    
							            <button type="button" class="btn btn-primary" id="orderconfirmOn" style="float:right;margin-right:15px;" >Cash On Delivery</button>
                                     
                                        <button type="button" class="btn btn-primary " id="orderconfirmOn2" style="float:right;margin-right:15px;" >Credit / Debit Card</button>
								</form>        
                                <br>
                                ';
				}
			}
	}
	
	
}


//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}
?>