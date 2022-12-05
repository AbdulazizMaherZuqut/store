<?php 
  session_start();
  $namPage = 'Admin Login';
   require 'init.php'; 
   
      if ( isset( $_POST['submit'] )) :


          $userName  = $_POST['email']; 
          $passord   = $_POST['pass']; 
     
          
        if ( empty($userName) ) :
            showMessage('Write Your Email Please <br>'); 
        endif; 

        if ( empty($passord) ) : 
            showMessage('Write Your Password Please <br>');  
        endif;    

          $login  = "SELECT * FROM admins WHERE  email='$userName' AND password ='$passord'";
          $result = mysqli_query($status_conn,$login);
            if ( mysqli_num_rows($result) == 1 ) {  
                 $admin = mysqli_fetch_array($result);
                 $_SESSION['adminid']  =  $admin['id'];
                 $_SESSION['email']    = $admin['email'];
                 header('location:dashbord.php');
            } else {
                 showMessage('Sorry You Are Not Admin');
            }
      endif;
 ?>
<body>
       <div class="container">
         <div class="login"> 
            <h2 class="text-center"> Admin Login </h2>
         <form method="POST">
                Email :
            <input type="email" placeholder="write your Email.." name="email" class="form-control" required>   
                Password :
            <input type="password" placeholder="write your name" name="pass" class="form-control"  required>   
            <button type="submit" name="submit" class="btn btn-primary btn-log"> Login </button>
         </form>
       </div>
    </div>
<?php   
    include $tmp . 'footer.php';
?>