<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if (tambahmahasiswa($_POST, $_FILES) > 0) {
        echo "<script>alert('Data berhasil ditambahkan!'); document.location.href='datamahasiswa.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="foto">Foto:</label><br>
        <input type="file" name="foto" id="foto" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="nim">NIM:</label><br>
        <input type="text" name="nim" id="nim" required><br><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" name="jurusan" id="jurusan" required><br><br>

        <label for="nohp">No HP:</label><br>
        <input type="text" name="nohp" id="nohp" required><br><br>

        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>
