<?php  
 session_start();

  $namPage = 'Dashbord';
  require 'init.php'; 
  if ( !$_SESSION['adminid']  ) {
    header("location:index.php");
} 
?>
<div class="container mt-5">
  <div class="row">
        <div class="col-lg-4">
            <?php require $tmp . 'sidebar_us.php'  ?>
        </div>
        <div class="col-lg-8">
        <div class="card-body">
                <div class="row">
                  <div class="col-md-4"> 
                    <div class="card">
                      <div class="card-body text-center">
                         <i class="fas fa-users fa-2x"></i>
                         <h4> <?php echo getCount('admins') ?> </h4> 
                         <h4>Users</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-center">
                        <i class="fas fa-user-lock fa-2x"></i>
                         <h4> <?php echo getCount('categories') ?></h4> 
                         <h4> Categories </h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-center">
                        <i class="far fa-handshake fa-2x"></i>
                         <h4>  <?php echo getCount('products') ?> </h4> 
                         <h4> Products </h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

  </div>
</div>
<?php  return $tmp . 'footer.php'; ?>   
</body>
</html>


