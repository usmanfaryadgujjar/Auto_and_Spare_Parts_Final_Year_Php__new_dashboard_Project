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
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Manage Category </h3>
              </div>
              <div class="panel-body">
                 <H2>
                      Category
                  </H2>
                   
              <hr>
      	<div class="col-2" align="right">
      		<a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-info btn-lg">Add New Category</a>
      	</div>
      <hr>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Update / Delete</th>
                <th>Ref</th>
            </tr>
          </thead>
          <tbody id="category_list">
           
              
          </tbody>
        </table>
      </div>
             
                  <!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" enctype="multipart/form-data">
        	<div class="">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="cat_title" class="form-control" placeholder="Enter Brand Name">
		        	</div>
        		</div>
        		<input type="hidden" name="add_category" value="1">
        		<div class="col-12 " style="float:right">
        			<button type="button" class="btn btn-success add-category">Add Category</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
        	</div>
        	<br>
            <hr>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--Edit category Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" enctype="multipart/form-data">
          <div class="">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="e_cat_title" class="form-control" placeholder="Enter Brand Name">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div style="float:right">
              <button type="button" class="btn btn-success edit-category-btn">Update Category</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
              <br><hr>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


                  
                  
                  
                  
              </div>
            </div>
        </div>
            
            
      </div>
    </div>
    
    <script>
    
        $(document).ready(function(){

	getCategories();
	
	function getCategories(){
		$.ajax({
			url : 'Admin_Data_Class/GetProduct.php',
			method : 'POST',
			data : {GET_CATEGORIES:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				var brandHTML = '';

                
				$.each(resp.message, function(index, value){
					brandHTML += '<tr>'+
									'<td></td>'+
									'<td>'+ value.cat_title +'</td>'+
									'<td><a class="btn btn-sm btn-info edit-category"><span style="display:none;">'+JSON.stringify(value)+'</span><i class=" glyphicon glyphicon-pencil"></i></a>&nbsp;<a cid="'+value.cat_id+'" class="btn btn-sm btn-danger delete-category"><i class=" glyphicon glyphicon-trash"></i></a></td>'+
                                    '<td>'+ value.admin_id +'</td>'+
								'</tr>';
				});

				$("#category_list").html(brandHTML);

			}
		})
		
	}

	$(".add-category").on("click", function(){

		$.ajax({
			url : 'Admin_Data_Class/GetProduct.php',
			method : 'POST',
			data : $("#add-category-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getCategories();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				$("#add_category_modal").modal('hide');
			}
		})

	});

	$(document.body).on("click", ".edit-category", function(){

		var cat = $.parseJSON($.trim($(this).children("span").html()));
		$("input[name='e_cat_title']").val(cat.cat_title);
		$("input[name='cat_id']").val(cat.cat_id);

		$("#edit_category_modal").modal('show');

		

	});

	$(".edit-category-btn").on('click', function(){

		$.ajax({
			url : 'Admin_Data_Class/GetProduct.php',
			method : 'POST',
			data : $("#edit-category-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getCategories();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				$("#edit_category_modal").modal('hide');
			}
		})

	});

	$(document.body).on('click', '.delete-category', function(){

		var cid = $(this).attr('cid');

		if (confirm("Are you sure to delete this category")) {
			$.ajax({
				url : 'Admin_Data_Class/GetProduct.php',
				method : 'POST',
				data : {DELETE_CATEGORY:1, cid:cid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						alert(resp.message);
						getCategories();
					}else if(resp.status == 303){
						alert(resp.message);
					}
				}
			})
		}else{
			alert('Cancelled');
		}

		

	});

});
        
    </script>
    
    </body>
</html>
           