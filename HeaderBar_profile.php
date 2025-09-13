<?php include "db2/db2.php"; ?>
<div class="gradl " >
    
    <div class="container-fluid " >
            
<nav class="navbar my-navbar">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Auto and Spare parts Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="index.php">Home</a></li>
      
    <li class="dropdown">
        <a  data-toggle="dropdown" href="#">Auto Parts </a>
        <ul class="dropdown-menu">
            <li>
                <a href="new_product.php">New Auto Parts</a>
            </li>
             <li>
                <a href="old_product.php">Old Auto Parts</a>
            </li>
          
        </ul>
      </li>
        
        <li>
        <a href="brand2profile.php">Brands</a>
      </li>
       			
        
    </ul>
     <div class="navbar-form navbar-left">
    <form method="post" onsubmit="return false">
      <div class="input-group" >
        <input type="text" class="form-control" style="width:370px;" placeholder="Search" name="search" id="search">
        <div class="input-group-btn">
          <button class="btn btn-default" id="search_btn" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>

        </div>
      </div>
    </form>
      </div>
    
    
   
      <ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container"  data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
                                <div class="row">
                                    <table><tr>
                                        <td><h3><strong><center>Product</center></strong></h3></td>
                                        </tr></table>
                                </div>
								<div class="row">
                                    <table id="t01">
                                        <tr>
                                    
									<div class="col-md-3"><th>No</th></div>
									<div class="col-md-3"><th>Image</th></div>
									<div class="col-md-3"><th>Name</th></div>
                                    <div class="col-md-3"><th>Price Rs</th></div>
                                        </tr>
                                    </table>
								</div>
							</div>
                            <div class="panel-body">
								<div id="cart_product">
							
                                </div>
							</div>
							
						</div>
					</div>
				</li>
				<li ><a href="#"  data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
                        <!-------
                        <li ><a href="Customer_cart.php" ><b><span class="glyphicon glyphicon-shopping-cart"><b>Cart</b></span></b></a></li>
                        <li class="divider"></li>
                        
                        ------------>
                        
						<li><a href="customer_order_view.php" ><b>Orders</b></a></li>
						<li class="divider"></li>
                        <li><a href="Customer_pass_change.php" ><b>Profile Update</b></a></li>
						<li class="divider"></li>
                        <li><a href="logout.php" ><b>Logout</b></a></li>
					</ul>
				</li>
				
			</ul>
      
      
      
  </div>
</nav>

          
        </div>
        </div>  
 