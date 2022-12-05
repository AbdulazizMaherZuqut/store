<?php  
 session_start();

    $iditem = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;  

    $namPage = 'Edit-Product';
    include 'init.php'; 
    if ( !$_SESSION['adminid']  ) {
        header("location:index.php");
    }

  if ( isset( $_POST['submit'] )) :

    $name  = $_POST['name']; 
    $des   = $_POST['des']; 
    $price = $_POST['price'];

    $img            = $_FILES['img-tst'];
    $oldimg         = trim ($_POST['old-img']  );     // old image   
    $cat   = $_POST['cat'];

    $nameimg  = $_FILES['img-tst'] ['name'];
    $tmpimg   = $_FILES['img-tst'] ['tmp_name'];
    $sizeimg  = $_FILES['img-tst'] ['size'];
    $typeimg  = $_FILES['img-tst'] ['type']; 

    if ( !empty(  $nameimg ) ) { 

        $imgExcetion = array('jpg','png','jpeg','gif');
        $exction  = strtolower($nameimg);
        $exction  = explode('.' , $nameimg);
        $exction  = end($exction);

                $imgrand = rand(0,1000000) . "_" . $nameimg;
                move_uploaded_file($tmpimg, "upload\img\\" . $imgrand);
    } else {
        $imgrand  = $oldimg; 
        // echo $imgrand;  
    }

                
            if ( empty($name) ) :
                showMessage('Must Write Name Of Category <br>'); 
            endif; 

            if ( empty($des) ) : 
                showMessage('Must Write Description Of Category <br>');  
            endif;  

            $update = "UPDATE  products SET name ='$name' , description = '$des' , price = '$price',
                 photo = '$imgrand'  ,  cat_id  = '$cat' 
              WHERE id = '$iditem' "; 
            mysqli_query( $status_conn , $update);
            header("location:products.php");
  endif;
?>
<?php 
         $sql     = "SELECT * FROM products where id = $iditem ";
         $query   = mysqli_query( $status_conn, $sql ); 
         $row     = mysqli_fetch_array($query); 

         $sql2  = "SELECT name FROM categories WHERE id = $iditem ";
     
     if ( $row > 0 )  {  ?> 

            <div class="container mt-5">
                    <form method="POST">
                        <div class="form-group">
                            <label for="email"> Name</label>
                            <input type="text" class="form-control" id="#email" 
                                name="name" aria-describedby="emailHelp"
                                 value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pass1"> Description </label>
                            <input type="text" class="form-control" id="pass1" name="des" 
                                 value="<?php echo $row['description']  ?>">
                        </div> 
                        <div class="form-group">
                            <label for="pass1"> Price </label>
                            <input type="number" class="form-control" id="pass1" name="price"
                                value="<?php echo $row['price'] ?>">
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Photo </label>
                            <div class="col-md-6">
                                <?php
                                    if (empty( $row['photo']  )) {
                                        echo 'No Have  Image';
                                        echo "<img  src='alt='No Have Img' />";
                                    } else{
                                        echo "<img width='200px' height='200px' src='upload/img/". $row['photo'] . "'alt='' /> <br>";
                                    }  
                                ?>
                        </div> 
                                <br> 
                                <input type="hidden" name="old-img" class="form-control" value ="<?php echo $row['photo'];  ?>">
                                <input type="file"  name="img-tst" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass1"> Catgories </label>
                            <select name="cat" class="form-control" required> 
                                <option value="<?php echo $row['cat_id'] ?>" > <?php echo $row['cat_id'] ?> </option>
                                <?php 
                                        $sql_show = 'SELECT * FROM categories';
                                        $result   = mysqli_query($status_conn , $sql_show);   
                                    while ($cat = mysqli_fetch_array($result)  ) {  ?>
                                        <option value="<?php echo $cat['id'] ?>"> <?php echo $cat['name'] ?>  </option>
                                    <?php   } ?>
                            </select>
                        </div> 
                        <button type="submit" name="submit" class="btn btn-outline-primary" id="#vald">Submit</button> 
                        <a href="products.php" class='btn btn-outline-info'> Back </a>
                    </form>  
            </div>
    <?php } ?>