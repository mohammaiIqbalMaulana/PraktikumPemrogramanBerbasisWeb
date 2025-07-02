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

    function tambahmahasiswa($data, $files) {
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $namaFile = $files['foto']['name'];
    $tmpName = $files['foto']['tmp_name'];
    $error = $files['foto']['error'];
    $ukuran = $files['foto']['size'];

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang diupload harus gambar (jpg/jpeg/png)');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    if (!is_dir('images')) {
        mkdir('images');
    }
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, nohp)
              VALUES ('$namaFileBaru', '$nama', '$nim', '$jurusan', '$nohp')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


    function hapusdata($id) {
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT foto FROM mahasiswa WHERE id = $id");
    $data = mysqli_fetch_assoc($result);

    if ($data['foto'] && file_exists("images/" . $data['foto'])) {
        unlink("images/" . $data['foto']);
    }

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

    function ubahdata($data, $files, $id)
    {
            global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $namaFile = $files['foto']['name'];
    $tmpName = $files['foto']['tmp_name'];
    $error = $files['foto']['error'];
    $ukuran = $files['foto']['size'];

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang diupload harus gambar (jpg/jpeg/png)');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    if (!is_dir('images')) {
        mkdir('images');
    }
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    $query = "UPDATE mahasiswa SET 
    foto='$namaFile',
    nama='$nama',
    nim='$nim',
    jurusan='$jurusan',
    nohp='$nohp'
    
    WHERE id=$id;
    ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
    }



?>