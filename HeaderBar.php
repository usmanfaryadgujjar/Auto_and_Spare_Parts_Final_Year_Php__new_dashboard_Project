<?php include "db2/db2.php"; ?>
<div class="gradl " >
    
    <div class="container-fluid " >
            
<nav class="navbar my-navbar">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Auto and Spare parts Center</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
      
        <li class="dropdown">
        <a  data-toggle="dropdown" href="#">Auto Parts </a>
        <ul class="dropdown-menu gradl">
            <li>
                <a href="new_product.php">New Auto Parts</a>
            </li>
             <li>
                <a href="old_product.php">Old Auto Parts</a>
            </li>
          
        </ul>
      </li>
        
        <li>
        <a href="brands.php">Brands</a>
      </li>
        
				
        
    </ul>
      <div class="navbar-form navbar-left">
    <form method="post" onsubmit="return false">
      <div class="input-group" >
        <input type="text" class="form-control" style="width:350px;" placeholder="Search" name="search" id="search">
        <div class="input-group-btn" style="float:left;">
          <button class="btn btn-default" id="search_btn" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>

        </div>
      </div>
    </form>
      </div>
    
    
    <ul class="nav navbar-nav navbar-right ">
      

        <li><a href="#"  data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
            
					<div class="dropdown-menu" >
						<div class="panel " style="width:600px; margin: 10px 10px 10px 10px; ">
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
        
        
        
      <li class="dropdown">
        <a  data-toggle="dropdown" href="#">My Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu gradl">
            
          <li><a href="Registration_C_S.php"><span class="glyphicon glyphicon-user"></span> Sign Up </a></li>
          
            <li><a href="Customer_login.php"><span class="glyphicon glyphicon-log-in"></span> Customer Login</a></li>
            
            <li><a href="Seller/index.php"><span class="glyphicon glyphicon-log-in"></span> Seller Login</a></li>
            
            
            
        </ul>
      </li>
      <hr>
     
    </ul>
  </div>
</nav>

          
        </div>
        </div>  
 