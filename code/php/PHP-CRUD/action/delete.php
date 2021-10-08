<?php
include ('../config/database.php');
if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $sql = "DELETE FROM users where id_user=$id_user";
    $query = mysqli_query($db,$sql);
    if($query){
        header ('location: ../list.php');
    }else{
         die ("FAILED");
    }
}
