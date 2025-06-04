<?php

    $koneksi = mysqli_connect("localhost:3306", "root", "","webif");

    if(!$koneksi)
    {
        die("Koneksi Gagal!".mysqli_connect_error());
    }

    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query); //// Object


    /// ambil data (fetch) dari lemari (database) $result

    $mhs = mysqli_fetch_object($result);
    /// mysqli_fetch_row()
    /// mysqli_fetch_assoc()
    /// mysqli_fetch_array()
    /// mysqli_fecth_object()


    var_dump($mhs->nama);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <nav align="center">
        <a href="index.php">HOME</a> | 
        <a href="profile.php">PROFILE</a> |
        <a href="about.php">ABOUT US</a> |
        <a href="login.php">LOGIN</a>
    </nav>

    <h1>Data Mahasiswa</h1>

    <table border="1" cellspacing="0" cellpadding="10">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No.HP</th>
        </tr>
    </table>
    
</body>
</html>