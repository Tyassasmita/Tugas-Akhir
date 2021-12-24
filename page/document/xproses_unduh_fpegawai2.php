<?php
if (ISSET($_REQUEST['file'])){
    $file = $_REQUEST['file'];

    //header("Cache-Control: Public");
    //header("Content-Description: File Tranfer");
    header("Content-Disposition: attachment; filename=".basename($file));
    header("Content-Type: application/octet-stream;");
    //header("Content-Transfer-Encoding: binary")
    readfile("filespegawai/".$file);
}
?>x