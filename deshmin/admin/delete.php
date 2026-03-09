<?php


include 'conntion.php';

$sid = $_GET['id'];

$delete = "DELETE FROM `add_product` WHERE id='$sid'";

$query = mysqli_query($conn, $delete);

 if($query){
    
        header('location: dashmin.php');
    }
 



?>