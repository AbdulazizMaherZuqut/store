<?php  
 session_start();

 $iditem = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;   

  $namPage = 'Categoreis';
  include 'init.php'; 
  if ( !$_SESSION['adminid']  ) {
    header("location:index.php");
  }

    if (isset($_GET['id']) ) {  
        $update = "DELETE from  categories WHERE id = '$iditem' "; 
            mysqli_query( $status_conn , $update);
            header("location:categoreis.php");
    }
