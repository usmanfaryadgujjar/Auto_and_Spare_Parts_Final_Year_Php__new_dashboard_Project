<?php 

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
            
            <?php include'Dashborad.php' ?>
            
            
      </div>
    </div>
    
    
    
    
    
    
    </body>
</html>