<?php
    global $koneksi;
    $host ="sql309.epizy.com";
    $user ="epiz_28655800";
    $pass ="7daoGRJbsMIo7d";
    $database ="epiz_28655800_admn";
    $koneksi = new mysqli($host,$user,$pass,$database);
        if(mysqli_connect_error()){
            trigger_error ('Koneksi ke database gagal :' .mysqli_connect_error().E_USER_ERROR);
        }
?>