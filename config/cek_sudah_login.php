<?php

session_start();

if(!empty($_SESSION["data_user"])){
    header("location: ../sudahlogin.php");
}