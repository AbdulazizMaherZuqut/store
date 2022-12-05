<?php  
 session_start();

  $namPage = 'Add-Categoreis';
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

            $sql_check = "SELECT name , description FROM categories WHERE name = '$name' ";
            $result    = mysqli_query($status_conn,$sql_check);

            if (mysqli_num_rows($result) == 1 )  {
                    showMessage( "This Category $name fIND Before");
            } else {
                $sql_ins = "INSERT INTO categories VALUES(NULL ,'$name','$des')";
                mysqli_query($status_conn,$sql_ins);
                header("location:categoreis.php");
            }
    endif;
?>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="email"> Name</label>
                <input type="text" class="form-control" id="#email" 
                    name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="pass1"> Description </label>
                <input type="text" class="form-control" id="pass1" name="des">
            </div> 
            <button type="submit" name="submit" class="btn btn-primary" id="#vald">Submit</button> 
        </form>  
    </div>