<?php  
 session_start();

  $namPage = 'Products';
  include 'init.php'; 

    if ( !$_SESSION['adminid']  ) {
        header("location:index.php");
    }

  $sql_show = 'SELECT * FROM products';
  $result   = mysqli_query($status_conn , $sql_show); 
  if ( mysqli_num_rows($result) ) {  ?>
    <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4">
                    <?php require $tmp . 'sidebar_us.php'  ?>
                </div>
            <div class="col-lg-8">
                <h4> Products </h4>
                    <table class="table table-striped table-dark">
                            <a href="add-pro.php" target="_blank"
                                class='btn btn-outline-primary mb-3'>
                                <i class='fas fa-plus'></i> Add New Product
                            </a>
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col"> Descriprion </th>
                                        <th scope="col"> Price </th>
                                        <th scope="col"> Image </th>
                                        <th scope="col"> Options </th>
                                    </tr>
                                </thead> 
                                <tbody> 
                                        <?php                              
                                        while ( $product = mysqli_fetch_array($result)  ) {  ?>
                                        <tr>            
                                            <td> <?= $product['name']  ?></td>
                                            <td> <?= $product['description'] ?> </td>
                                            <td> $ <?= $product['price'] ?>     </td>
                                            <td>
                                            <?php 
                                                if (empty( $product['photo']  )) {
                                                    echo 'No Have  Image';
                                                    echo "<img  src='alt='No Have Img' />";
                                                } else {
                                                    echo "<img width='100px' height='100px' 
                                                    src='upload/img/". $product['photo'] . "'alt='' />";
                                                } ?>
                                            </td>
                                            <td>
                                            <a href="edit-pro.php?id=<?= $product['id']; ?>"
                                                class='btn btn-outline-success mb-3'>
                                                <i class='fas fa-edit'></i> Edit
                                            </a> <br>
                                            <a href="del-pro.php?id= <?= $product['id']  ?>"
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
                        showMessage('Not Have Products');
                    } ?>
            </div>
    </div>
<?php  return $tmp . 'footer.php'; ?>   
</body>
</html>
