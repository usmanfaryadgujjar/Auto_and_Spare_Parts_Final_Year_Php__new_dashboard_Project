<?php 

if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}


?>

     <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Manager Panel </h3>
              </div>
                <!-- Admin panel body -->
              <div class="panel-body">
                  <H1>
                      Welcome <?php  echo $_SESSION['admin_name']; ?>
                  </H1>
                  <hr>
              
                  <?php include'Dashboard_list_seller_view.php'; ?>
                  
                  
                
                  
                  
              </div>
                <!-- End of Admin panel body -->
            </div>
        </div>
<!-- content -->
           