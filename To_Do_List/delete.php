This is delete page

<?php
    require_once('db_connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `list` WHERE Id= $id" ;

    if(mysqli_query($conn,$sql)){
        header("location:./read.php");
    }else{
         echo "delete fail" ;
    }
?>