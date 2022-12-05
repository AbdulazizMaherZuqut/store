<?php  
 session_start();

  $namPage = 'Add-Product';
  include 'init.php'; 
  if ( !$_SESSION['adminid']  ) {
    header("location:index.php");
  }

    if ( isset( $_POST['submit'] )) :

        $name  = $_POST['name']; 
        $des   = $_POST['des']; 
        $price = $_POST['price'];
        $img   = $_FILES['img-tst'];
        $cat   = $_POST['cat'];
       
        // var_dump( $cat);  exit(); 
        
               //  print_r($img);
               $nameimg  = $_FILES['img-tst'] ['name'];
               $tmpimg   = $_FILES['img-tst'] ['tmp_name'];
               $sizeimg  = $_FILES['img-tst'] ['size'];
               $typeimg  = $_FILES['img-tst'] ['type']; 
      
               $imgExcetion = array('jpg','png','jpeg','gif');
               $exction  = strtolower($nameimg);
               $exction  = explode('.' , $nameimg);
               $exction  = end($exction);


        if ( empty($name) ) :
            showMessage('Must Write Name Of Category <br>'); 
        endif; 

        if ( empty($des) ) : 
            showMessage('Must Write Description Of Category <br>');  
        endif;    

            $sql_check = "SELECT name , description FROM products WHERE name = '$name' ";
            $result    = mysqli_query($status_conn,$sql_check);

            if (mysqli_num_rows($result) == 1 )  {
                    showMessage( "This Product $name fIND Before");
            } else {
                
                $imgrand = rand(0,1000000) . "_" . $nameimg;
                move_uploaded_file($tmpimg, "upload\img\\" . $imgrand);

                 $sql_ins = "INSERT INTO products VALUES(NULL ,'$name', '$des' , '$price' ,  '$imgrand'  , '$cat' )";
                    mysqli_query($status_conn,$sql_ins);
                    header("location:products.php");
            }
    endif;
?>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email"> Name</label>
                <input type="text" class="form-control" id="#email" 
                    name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="pass1"> Description </label>
                <input type="text" class="form-control" id="pass1" name="des">
            </div> 
            <div class="form-group">
                <label for="pass1"> Price </label>
                <input type="number" class="form-control" id="pass1" name="price">
            </div> 
            <div class="form-group"">
                <label class="col-sm-2 control-label">  Photo </label>
                <!-- <input type="file" name="p_image" 
                    autocomplete="off" required=> -->
                <input type="file" name="img-tst" class="form-control" required=>
            </div>
            <div class="form-group">
                <label for="pass1"> Catgories </label>
                <select name="cat" class="form-control"> 
                    <option>Chosse Category </option>
                    <?php 
                            $sql_show = 'SELECT * FROM categories';
                            $result   = mysqli_query($status_conn , $sql_show);   
                            while ($cat = mysqli_fetch_array($result)  ) {  ?>
                              <option value="<?php echo $cat['id'] ?>"> <?php echo $cat['name'] ?>  </option>
                         <?php   } ?>
                </select>
            </div> 

            <button type="submit" name="submit" class="btn btn-primary" id="#vald">Submit</button> 
        </form>  
    </div>