<?php

    require 'function.php';

    if(isset($_POST["submit"]))
    {
        if(tambahmahasiswa($_POST)>0)
        {
            echo "
            <script>
                alert('Berhasil!');
                document.location.href = 'datamahasiswa.php';
            </script>
            ";
        }
        else
        {
            echo "
            <script>
                alert('Gagal!');
                document.location.href = 'datamahasiswa.php';
            </script>
            ";
            mysqli_error($koneksi);
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="foto">Foto: </label>
    <input type="file" name="foto" id="foto"><br>

    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama"><br>

    <label for="nim">NIM: </label>
    <input type="text" name="nim" id="nim"><br>

    <label for="jurusan">Jurusan: </label>
    <input type="text" name="jurusan" id="jurusan"><br>

    <label for="nohp">No HP: </label>
    <input type="text" name="nohp" id="nohp"><br>

    <button type="submit" name="submit">Tambah</button>
</form>
</body>
</html>