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
                  <H4>
                      Customer List
                  </H4>
                  
                   <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
                <th>Status</th>
              <th>Address</th>
                <th>CNIC No</th>
                <th>Update</th>
            </tr>
          </thead>
          <tbody id="customer_list">
           
              
          </tbody>
        </table>
      </div>
    
                  
                  
                  
                  
                  
                  
              </div>
            </div>
        </div>
            
                            
<!-- Edit Admin Modal start --------->
<div class="modal fade" id="edit_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Customer List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-customer-form" method="POST" enctype="multipart/form-data">
          <div class="">
            <div class="col-5">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="cusf_name" class="form-control">
              </div>
            </div>
                <div class="col-5">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="cusl_name" class="form-control">
              </div>
            </div>
          
              <div class="col-5">
              <div class="form-group">
                <label>CNIC No </label>
                <input type="text" name="cnic" class="form-control">
              </div>
            </div>
          
              <div class="col-5">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
              </div>
            </div>
                <div class="col-5">
              <div class="form-group">
                <label>New Password</label>
                <input type="text" name="password" class="form-control" Placeholder="Enter New Password">
              </div>
            </div>
              <input type="hidden" name="customer_id">
            
            <input type="hidden" name="edit_customer" value="1">
            <div class="col-12 modal-footer">
              <button type="button" class="btn btn-primary sub-edit-customer">Submit</button>
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

                getCustomers();
	
	function getCustomers(){
		$.ajax({
			url : 'Admin_Data_Class/GetCustomerOrderLister.php',
			method : 'POST',
			data : {GET_CUSTOMERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function(index, value){

						customersHTML += '<tr>'+
									          '<td></td>'+
									          '<td>'+value.first_name+' '+value.last_name+'</td>'+
									          '<td>'+value.email+'</td>'+
									          '<td>'+value.mobile+'</td>'+
                                                '<td>'+value.user_type+'</td>'+
									          '<td><B>First Address : </B>'+value.address1+'<br><B>Second Address : </B>'+value.address2+'</td>'+
                                                '<td>'+value.cnic+'</td>'+
                                '<td><a class="btn btn-sm btn-info edit-customer"><span style="display:none;">'+JSON.stringify(value)+'</span><i class=" glyphicon glyphicon-pencil"></i></a>&nbsp;<a pid="'+value.user_id+'" class="btn btn-sm btn-danger delete-customer" style="color:#fff;"><i class=" glyphicon glyphicon-trash"></i></a></td></tr>'

					});

					$("#customer_list").html(customersHTML);

				}else if(resp.status == 303){

				}

			}
		})
		
	}
            
            
            
                  
     /* show value */
     $(document.body).on("click", ".edit-customer", function(){

		var customer = $.parseJSON($.trim($(this).children("span").html()));
		console.log(customer);
		$("input[name='cusf_name']").val(customer.first_name);
        $("input[name='cusl_name']").val(customer.last_name);
		$("input[name='email']").val(customer.email);
         $("input[name='customer_id']").val(customer.user_id);
          $("input[name='cnic']").val(customer.cnic);
        // $("input[name='password']").val(admin.password);
		$("#edit_customer_modal").modal('show');

		

	});
     
            
            
     $(".sub-edit-customer").on('click', function(){

		$.ajax({

			url : 'Admin_Data_Class/GetCustomerOrderLister.php',
			method : 'POST',
			data : new FormData($("#edit-customer-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-customer-form").trigger("reset");
					$("#edit_customer_modal").modal('hide');
					getCustomers();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});
    
     
    $(document.body).on('click', '.delete-customer', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are You Sure To Delete Account ?")) {
			$.ajax({

				url : 'Admin_Data_Class/GetCustomerOrderLister.php',
				method : 'POST',
				data : {DELETE_Customer: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getCustomers();
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
           
