<?php 

function pageTitle() {
    global $namPage;
    if (isset($namPage  )) {
            echo $namPage;  
        } else  {
            $namPage = "Default";
        }
} 

function showMessage($msg) {
     echo '<div class="container mt-3">';
        echo "<div class='alert alert-primary text-center' role='alert'> $msg </div>"; 
    echo '</div>';
}

function delete($tbl, $colum , $value ) {
    global $status_conn;
    $sql_del  = "DELETE FROM $tbl WHERE $colum = '$value' ";
    mysqli_query($status_conn ,$sql_del);
}

function getCount($tbl) {
    global $status_conn;
    $sql_sate   = " SELECT COUNT(*) AS Total FROM $tbl ";
    $result     = mysqli_query($status_conn , $sql_sate);
    $count      = mysqli_fetch_array($result);
    return $count['Total'];
} 

function getData($tbl , $colum  , $value)  {
    global $status_conn;
    $sql      = "SELECT * FROM $tbl WHERE $colum ='$value' ";
    $result   =  mysqli_query($status_conn, $sql);
    $row      =  mysqli_fetch_array($result); 
    return $row;
}