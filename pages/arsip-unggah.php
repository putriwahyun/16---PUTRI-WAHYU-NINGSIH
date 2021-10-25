<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arsip</title>
    <style>
        tr, td {
            padding: 10px;
            padding-right: 25px;
        }
    </style>

</head>

<body>
    <div class="content">
        <h1><b>Arsip Surat >> Unggah</b></h1>
        <p style="color: black;">Unggah surat yang telah terbit pada form ini untuk diarsipkan<br>
            Catatan: <br>
        <ul style="color: black;">
            <li>Gunakan file berformat PDF</li>
        </ul>
        </p>
        <form action="proses/arsip-unggah-proses.php" method="post" enctype="multipart/form-data">
            <table id="tabel-input" style="color: black;">
                <tr>
                    <td class="label-formulir">Nomor Surat</td>
                    <td class="isian-formulir"><input type="text" name="no_surat" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Kategori</td>
                    <td class="isian-formulir">
                        <select name="kategori" id="kategori-arsip">
                            <option value="Undangan">Undangan</option>
                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Nota Dinas">Nota Dinas</option>
                            <option value="Pemberitahuan">Pemberitahuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Judul</td>
                    <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border" style="width:700px;"></td>
                </tr>
                <tr>
                    <td class="label-formulir">File Surat (PDF)</td>
                    <td class="isian-formulir"><input type="file" name="file-arsip" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="isian-formulir" style="text-align: right;"><input type="button" value="<< Kembali" onclick="history.back()"></td>
                    <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
                </tr>
            </table>
        </form>
    </div>
</body>