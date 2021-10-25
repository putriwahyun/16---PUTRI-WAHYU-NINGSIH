<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
        <?php
        $no_surat = mysqli_real_escape_string($db, $_GET['nosurat']);
        $query = mysqli_query($db, "SELECT * FROM arsipsurat WHERE nosurat='$no_surat' ");
        $data  = mysqli_fetch_array($query);
        ?>
        <div class="main" style="padding-left: 100px;">
            <h1><b>Arsip Surat >> Lihat</b></h1>
            <p>Nomor: <?php echo $data['nosurat']; ?> </p>
            <p>Kategori: <?php echo $data['kategori']; ?> </p>
            <p>Judul: <?php echo $data['judul']; ?> </p>
            <p>Waktu unggah: <?php echo $data['waktuarsipan']; ?> </p>
            <br>
        
            <embed src="../file/<?php echo $data['filesurat']; ?>" type="application/pdf" width="90%" height="600">
            <br>
            <div class="buttonbutton" style="padding: 10px">
                <button onclick="history.back()"><< Kembali</button>
                <a href="../file/<?php echo $data['filesurat']; ?>" target="_blank"><button>Unduh</button></a>
                <button onclick="history.back()">Edit/Ganti File</button>
            </div>

        </div>
        

</body>

</html>