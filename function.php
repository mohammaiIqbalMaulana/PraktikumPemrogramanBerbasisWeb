<?php

$koneksi = mysqli_connect("localhost", "root", "", "webif");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    if ($error === 4) {

        return false;
    }


    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}


function tambahmahasiswa($data, $files)
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
                VALUES
              ('', '$foto', '$nama', '$nim', '$jurusan', '$nohp')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function ubahdata($data, $files, $id)
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $query_foto_lama = "SELECT foto FROM mahasiswa WHERE id = $id";
    $result_foto_lama = mysqli_query($koneksi, $query_foto_lama);
    $data_foto_lama = mysqli_fetch_assoc($result_foto_lama);
    $foto_lama = $data_foto_lama['foto'];

    if ($files['foto']['error'] === 4) {
        $foto_baru = $foto_lama;
    } else {
        $foto_baru = upload();
        if (!$foto_baru) {
            return false;
        }

        if ($foto_lama && file_exists('images/' . $foto_lama)) {
            unlink('images/' . $foto_lama);
        }
    }

    $query = "UPDATE mahasiswa SET
                foto = '$foto_baru',
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                nohp = '$nohp'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;

    $query_foto = "SELECT foto FROM mahasiswa WHERE id = $id";
    $result_foto = mysqli_query($koneksi, $query_foto);
    $data_foto = mysqli_fetch_assoc($result_foto);
    $nama_foto = $data_foto['foto'];

    if ($nama_foto && file_exists('images/' . $nama_foto)) {
        unlink('images/' . $nama_foto);
    }

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}