<?php

if(empty($_SESSION["data_user"])){
    header("location: ../auth/login.php");
}

// if($data_user['level']==0){
//         header("location: ../admin/dashboard.php");
//         if($data_user['level']==1){
//         header("location: ../user/home.php");
//     }
//     }else{
//         header("location: ../auth/login.php");
//     }