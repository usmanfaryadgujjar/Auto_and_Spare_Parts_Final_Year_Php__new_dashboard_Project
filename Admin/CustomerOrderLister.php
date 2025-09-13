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
            <?php include'navigationLeft.php' ?>
            
            <!------------Body of Content Part --------->
            <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Customer </h3>
              </div>
              <div class="panel-body">
                  <H4>Customer Order List</H4>
                  <hr>
                 
         <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Order </th>
             <th>Customer Id</th>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Payment Status</th>
                <th>Order Status</th>
                <th>Confirm Update</th>
                
            </tr>
          </thead>
          <tbody id="customer_order_list">
           
          </tbody>
        </table>
      </div>
    
                  
                  
                  
                  
                  
                  
              </div>
            </div>
        </div>
           
            
            
                                
<!-- Edit Admin Modal start --------->
<div class="modal fade" id="edit_admin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-admin-form" method="POST" enctype="multipart/form-data">
          <div class="">
            <div class="col-5">
              <div class="form-group">
                <label>Order Id</label>
                <input type="text" name="order_id" class="form-control" readonly>
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label>Customer Id</label>
                <input type="text" name="user_id" class="form-control" readonly>
              </div>
            </div>
      
               <div class="col-5">
              <div class="form-group">
                <label>Order Status</label>
                <input type="text" name="order_status" class="form-control" >
              </div>
            </div>
      
              
              <input type="hidden" name="seller_id">
            
            <input type="hidden" name="edit_customer" value="1">
            <div class="col-12 modal-footer">
              <button type="button" class="btn btn-primary sub-edit-admin">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <br>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal end -->

            
            
      </div>
    </div>
    <script>
    
        
$(document).ready(function(){

getCustomerOrders();

    
	function getCustomerOrders(){
		$.ajax({
			url : 'Admin_Data_Class/GetCustomerOrderLister.php',
			method : 'POST',
			data : {GET_CUSTOMER_ORDERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function(index, value){

						customerOrderHTML +='<tr>'+
								            
								              '<td>'+ value.order_id +'</td>'+
                                                '<td>'+ value.user_id +'</td>'+
								              '<td>'+ value.product_id +'</td>'+
								              '<td>'+ value.product_title +'</td>'+
								              '<td>'+ value.qty +'</td>'+
								              '<td>'+ value.payment_status +'</td>'+
                                                '<td>'+value.order_status+'</td>'+
                                                '<td><a class="btn btn-sm btn-info edit-customer-ord"><span style="display:none;">'+JSON.stringify(value)+'</span><i class=" glyphicon glyphicon-pencil"></i></a>&nbsp;<a pid="'+value.order_id+'" class="btn btn-sm btn-danger delete-order" style="color:#fff;"><i class=" glyphicon glyphicon-trash"></i></a> - By Edit : '+value.edit_status+'</td></tr>';

					});

					$("#customer_order_list").html(customerOrderHTML);

				}else if(resp.status == 303){
					$("#customer_order_list").html(resp.message);
				}

			}
		})
		
	}

     function load_data(query)
             {
              $.ajax({
               url:"Admin_Data_Class/GetCustomerOrderLister.php",
               method:"POST",
               data:{query:query},
               success:function(data)
               {
                $('#customer_order_list').html(data);
               }
              });
             }

             $('#search_text').keyup(function(){
              var search = $(this).val();
              if(search != '')
              {
               load_data(search);
              }else{
                  getCustomerOrders();
                }
     
 });
    
    
      /* show value */
     $(document.body).on("click", ".edit-customer-ord", function(){

		var admin = $.parseJSON($.trim($(this).children("span").html()));
		console.log(admin);
		$("input[name='order_id']").val(admin.order_id);
         $("input[name='user_id']").val(admin.user_id);
         $("input[name='order_status']").val(admin.order_status);
     	$("#edit_admin_modal").modal('show');

		

	});
   
    
     $(".sub-edit-admin").on('click', function(){

		$.ajax({

			url : 'Admin_Data_Class/GetCustomerOrderLister.php',
			method : 'POST',
			data : new FormData($("#edit-admin-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-admin-form").trigger("reset");
					$("#edit_admin_modal").modal('hide');
					
					alert(resp.message);
                    getCustomerOrders();
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});
    
     
  $(document.body).on('click', '.delete-order', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are You Sure To Delete Order ?")) {
			$.ajax({

				url : 'Admin_Data_Class/GetCustomerOrderLister.php',
				method : 'POST',
				data : {DELETE_Customer_order: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getCustomerOrders();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});        
  


});



        
    </script>
    </body>
</html>
           