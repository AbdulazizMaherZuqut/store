<?php 

define('SERVER_NAME' , 'localhost');
define('USER_NAME' , 'root');
define('PASSWORD' , '');
define('DB_NAME','store');

  $status_conn =  mysqli_connect( SERVER_NAME , USER_NAME , PASSWORD  , DB_NAME ); 
  if ( !$status_conn ) {
    die ('Problem In Conntet With Database');
  } else {
    //  echo 'Conntect Suecsseful';
  }
