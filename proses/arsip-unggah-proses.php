<?php 
    include '../koneksi.php';

    $no_surat = $_POST['no_surat'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];

    if (isset($_POST['simpan'])) {
        extract($_POST);
        $nama_file = $_FILES['file-arsip']['name'];

        if(!empty($nama_file)){
            $lokasi_file = $_FILES['file-arsip']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_arsip = $judul.".".$tipe_file;

            $folder = "../file/$file_arsip";
            move_uploaded_file($lokasi_file, "$folder");
        } else {
            $file_arsip="";
        }

        $sql = "INSERT INTO arsipsurat (nosurat, kategori, judul, filesurat) VALUES('$no_surat', '$kategori', '$judul', '$file_arsip')";
        $query = mysqli_query($db, $sql);

        header("location:../index.php?p=arsip");
    }
?>