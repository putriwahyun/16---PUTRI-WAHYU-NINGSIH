<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arsip</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!--- Content ------------------------------->
    <div id="main">

        <div class="content">
            <h1><b>Arsip Surat</b></h1>
            <p style="color: black;">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat.
            </p>
        </div>
        <div class="maincontent">
            <p id="tombol-tambah-container">
            <div class="form-inline">
                <div align="center">
                    <form method="post">
                        <label>Cari Surat: </label>
                        <input type="text" name="pencarian">
                        <input type="submit" name="search" value="Cari" class="tombol">
                    </form>
                </div>
                </p>
                <table id="tabel-tampil">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th id="label-opsi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $batas = 5;
                        extract($_GET);
                        if (empty($hal)) {
                            $posisi = 0;
                            $hal = 1;
                            $nomor = 1;
                        } else {
                            $posisi = ($hal - 1) * $batas;
                            $nomor = $posisi + 1;
                        }

                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                            if ($pencarian != "") {
                                $sql = "SELECT * FROM arsipsurat WHERE nosurat LIKE '%$pencarian%'
                                OR kategori LIKE '%$pencarian%'
                                OR judul LIKE '%$pencarian%'
                                OR waktuarsipan LIKE '%$pencarian%'";
                                $query = $sql;
                                $queryJml = $sql;
                            } else {
                                $query = "SELECT * FROM arsipsurat LIMIT $posisi, $batas";
                                $queryJml = "SELECT * FROM arsipsurat";
                                $no = $posisi * 1;
                            }
                        } else {
                            $query = "SELECT * FROM arsipsurat LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM arsipsurat";
                            $no = $posisi * 1;
                        }

                        $q_tampil_arsipsurat = mysqli_query($db, $query);

                        if (mysqli_num_rows($q_tampil_arsipsurat) > 0) {
                            while ($r_tampil_arsipsurat = mysqli_fetch_array($q_tampil_arsipsurat)) {
                        ?>
                                <tr>
                                    <td><?php echo $r_tampil_arsipsurat['nosurat']; ?></td>
                                    <td><?php echo $r_tampil_arsipsurat['kategori']; ?></td>
                                    <td><?php echo $r_tampil_arsipsurat['judul']; ?></td>
                                    <td><?php echo $r_tampil_arsipsurat['waktuarsipan']; ?></td>
                                    <td>
                                        <div class="tombol-opsi-container"><a href="proses/arsip-hapus.php?nosurat=<?php echo $r_tampil_arsipsurat['nosurat'];
                                        ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
                                        <!-- Opsi pengembalian -->
                                        <div class="tombol-opsi-container"><a href="file/<?php echo $r_tampil_arsipsurat['filesurat'];?>" target="_blank" class="tombol">Unduh</a></div>
                                        <div class="tombol-opsi-container"><a href="proses/arsip-lihat.php?nosurat=<?php echo $r_tampil_arsipsurat['nosurat'];
                                        ?>" class="tombol">Lihat</a></div>
                                    </td>
                                </tr>
                        <?php
                                $nomor++;
                            }
                        } else {
                            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div style="margin: 10px;">
                    <div class="tombol-opsi-container"><a href="index.php?p=arsip-unggah" class="tombol" style="padding: 5px; color: black; border-radius: 2px; margin-left: 50px;">Arsipkan Surat ..</a></div>
                </div>
                <br><br>

                <?php
                if (isset($_POST['pencarian'])) {
                    if ($_POST['pencarian'] != '') {
                        echo "<div style=\"float:left; padding-left: 60px;\">";
                        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                        echo "Data Hasil Pencarian: <b>$jml</b>";
                        echo "</div>";
                    }
                } else {
                ?>
                    <div style="float: left; padding-left: 60px; padding-bottom: 20px">
                        <?php
                        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                        echo "Jumlah Data : <b>$jml</b>";
                        ?>
                    </div>
                    <div class="pagination" style="float: right; padding-right: 60px">
                        <?php
                        $jml_hal = ceil($jml / $batas);
                        for ($i = 1; $i <= $jml_hal; $i++) {
                            if ($i != $hal) {
                                echo "<a href=\"?p=transaksi-peminjaman&hal=$i\">$i</a>";
                            } else {
                                echo "<a class=\"active\">$i</a>";
                            }
                        }
                        ?>
                    </div>
                    <br>

                <?php
                }
                ?>
            </div>
        </div>
    </div><!-- div main -->

</body>

</html>