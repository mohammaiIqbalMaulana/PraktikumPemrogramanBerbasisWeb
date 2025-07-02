<?php

    require 'function.php';

    $id = $_GET['id'];

    $mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];


if (isset($_POST["submit"])) {
    if (ubahdata($_POST, $_FILES, $id) > 0) {
        echo "<script>alert('berhasil !!'); document.location.href='../datamahasiswa.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="foto">Foto:</label><br>
        <input type="file" name="foto" id="foto" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama"
        placeholder="Nama Lengkap*" required value="<?= $mhs["nama"]?>" /><br>

        <label for="nim">NIM:</label><br>
        <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]?>" /><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>" /><br>

        <label for="nohp">No HP:</label><br>
        <input type="text" name="nohp" id="nohp" required value="<?= $mhs["nohp"]?>" /><br>

        <button type="submit" name="submit">Ubah</button>
    </form>
</body>
</html>
