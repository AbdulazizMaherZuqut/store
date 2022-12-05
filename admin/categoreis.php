<?php  
 session_start();

  $namPage = 'Categoreis';
  include 'init.php'; 

  if ( !$_SESSION['adminid']  ) {
    header("location:index.php");
  }
        $sql_show = 'SELECT * FROM categories';
        $result   = mysqli_query($status_conn , $sql_show); 
        if ( mysqli_num_rows($result) ) {  ?>
  <div class="container mt-5">
    <div class="row">
          <div class="col-lg-4">
              <?php require $tmp . 'sidebar_us.php'  ?>
          </div>
          <div class="col-lg-8">
              <h4> Categories </h4>
            <table class="table table-striped table-dark">
                    <a href="addcate.php" target="_blank"
                        class='btn btn-outline-primary mb-3'>
                        <i class='fas fa-plus'></i> Add New Category
                    </a>
                    <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col"> Descriprion </th>
                              <th scope="col"> Options </th>
                            </tr>
                    </thead> 
                    <tbody> 
                              <?php                              
                                while ($cat = mysqli_fetch_array($result)  ) {  ?>
                                  <tr>            
                                    <td> <?= $cat['name']  ?></td>
                                    <td> <?= $cat['description']      ?></td>
                                    <td>
                                    <a href="edit-cat.php?id=<?= $cat['id']; ?>"
                                          class='btn btn-outline-success'>
                                        <i class='fas fa-edit'></i> Edit
                                    </a>
                                    <a href="del-cat.php?id= <?= $cat['id']  ?>"
                                          class='btn btn-outline-danger'>
                                        <i class="fas fa-trash"></i> Delete 
                                    </a>
                                    </td>                                   
                                  </tr>
                                <?php   }  ?>                           
                      </tbody>
            </table>
          </div> 
          <?php } else {
                  showMessage('Not Have Categories');
            } ?>
    </div>
  </div>
  <?php  return $tmp . 'footer.php'; ?>   
</body>
</html>
