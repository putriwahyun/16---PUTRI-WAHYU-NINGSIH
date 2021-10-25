<?php 
    include '../koneksi.php';

    $no_surat = mysqli_real_escape_string($db, $_GET['nosurat']);
    $query = mysqli_query($db, "SELECT * FROM arsipsurat WHERE nosurat='$no_surat' ");
    $data  = mysqli_fetch_array($query);
    $target = "../file/$data[filesurat]";

    if (file_exists($target)) {
        unlink($target);
    }

    mysqli_query($db, "DELETE FROM arsipsurat WHERE nosurat = '$no_surat'");

    header("location:../index.php?p=arsip");
?>