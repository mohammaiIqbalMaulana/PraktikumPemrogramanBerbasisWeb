<?php
    $koneksi = mysqli_connect("localhost:3306", "root", "","webif");

    if(!$koneksi)
    {
        die("Koneksi Gagal!".mysqli_connect_error());
    }

    function query($query)
    {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);

        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result) )
        {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambahmahasiswa($data) {
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $namaFile = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    if ($error === 4) {
        echo "<script>alert('Silakan upload foto terlebih dahulu');</script>";
        return false;
    }

    move_uploaded_file($tmpName, 'images/' . $namaFile);

    $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, nohp)
              VALUES ('$namaFile', '$nama', '$nim', '$jurusan', '$nohp')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
    }


    function hapusdata($id)
    {
        global $koneksi;
        $query = "DELETE FROM mahasiswa where id=$id";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }


?>