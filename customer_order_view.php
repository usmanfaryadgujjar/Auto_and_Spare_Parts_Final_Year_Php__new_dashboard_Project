
<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'Head.php'; ?>
        
         
    </head>
   <body>
      
   
       <!---header bar---->
       
        <?php include 'HeaderBar_profile.php'; ?>  
       
   
       
       <!-------header bar end--------------->
        
       
       <div class="container-fluid gradl" > 
       <div class="panel-body">
                  <H4>Order List</H4>
                  <hr>
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Payment Status</th>
                <th>Order Status</th>
            </tr>
          </thead>
          <tbody id="customer_side_order_list_view">
           
          </tbody>
        </table>
      </div>
    <?php 
           $id_c = $_SESSION["uid"];
            $a=0;
           $ct_p=0;
    $data = "SELECT * FROM orders where user_id = '$id_c' and payment_status='cash_on_delivery' and order_status='process_order' or order_status='complete'  ";
					$view = mysqli_query($con,$data);
					while($_view = mysqli_fetch_assoc($view))
					{		
                        $id_c_pro = $_view['product_id'];
                        $id_c_user = $_view['user_id'];
                        $id_c_pro_qty = $_view['qty'];
                       if(!empty($id_c_pro))
                       {
                           $data2 = "SELECT * FROM products where product_id = '$id_c_pro' ";
                            $view2 = mysqli_query($con,$data2);
                            while($_view2 = mysqli_fetch_assoc($view2))
                            {
                                $rs_p=$_view2['product_price'];
                                $S_Price = $rs_p*$id_c_pro_qty;
                                if(!empty($S_Price))
                                {
                                 $a+=$S_Price;
                                  $ct_p++;  
                                }
                           

                            }
                           
                         //$S_Price = $rs_p*$id_c_pro_qty;
                           //$a=$S_Price++ ;
                       }
                        
                       
                    }
           
           echo"<table>
           <tr>
           <td> <h4><b>Product Details Of Process Order </b></h4><hr> Total Product : $ct_p<br> Total Rs : $a </td>
           
           </tr>
           </table>";
    
           
           ?>
                  
                  
              </div>
       
       
       </div>  
       
       
       
       
       <!---------------------------->
       <?php include 'Footer.php'; ?>
       
    
       <script type="text/javascript" src="Seller/dist/js/site.min.js"></script>
        
        <script>
    
        
$(document).ready(function(){

getCustomerOrdersView();

	function getCustomerOrdersView(){
		$.ajax({
			url : 'customer_order_get.php',
			method : 'POST',
			data : {GET_CUSTOMER_ORDERS_view:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function(index, value){

						customerOrderHTML +='<tr>'+
								              '<td>'+ value.order_id +'</td>'+
								              '<td>'+ value.product_title +'</td>'+
								              '<td>'+ value.qty +'</td>'+
								              '<td>'+ value.payment_status +'</td>'+
                                                '<td>'+value.order_status+'</td>'+
								            '</tr>';

					});

					$("#customer_side_order_list_view").html(customerOrderHTML);

				}else if(resp.status == 303){
					$("#customer_side_order_list_view").html(resp.message);
				}

			}
		})
		
	}



});



        
    </script>
   
       
    </body>
</html>