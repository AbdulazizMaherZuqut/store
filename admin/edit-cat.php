<?php  
 session_start();

    $iditem = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;  

    $namPage = 'Edit-Category';
    include 'init.php'; 
    if ( !$_SESSION['adminid']  ) {
        header("location:index.php");
    }

  if ( isset( $_POST['submit'] )) :

            $name  = $_POST['name']; 
            $des   = $_POST['des']; 
                
            if ( empty($name) ) :
                showMessage('Must Write Name Of Category <br>'); 
            endif; 

            if ( empty($des) ) : 
                showMessage('Must Write Description Of Category <br>');  
            endif;  

            $update = "UPDATE  categories SET name ='$name' , description = '$des' WHERE id = '$iditem' "; 
            mysqli_query( $status_conn , $update);
            header("location:categoreis.php");
  endif;
?>
<?php 
         $sql     = "SELECT * FROM categories where id = $iditem ";
         $query   = mysqli_query( $status_conn, $sql ); 
         $row     = mysqli_fetch_array($query); 
     
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
                        <button type="submit" name="submit" class="btn btn-outline-primary" id="#vald">Submit</button> 
                        <a href="categoreis.php" class='btn btn-outline-info'> Back </a>
                    </form>  
            </div>
    <?php } ?>