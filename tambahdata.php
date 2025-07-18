<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

if(isset($_POST["submit"])) {
    if(tambahmahasiswa($_POST, $_FILES) > 0) {
        header("Location: datamahasiswa.php?status=success&message=Data+berhasil+ditambahkan");
        exit;
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }
}

$title = "Tambah Data Mahasiswa";
include 'includes/main_header.php';
?>

<div class="container d-flex justify-content-center">
    <div class="card p-4 mt-5">
        <h2 class="text-center mb-4">Tambah Data Mahasiswa</h2>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
            </div>
            
            <div class="mb-3">
                <label for="nohp" class="form-label">No HP:</label>
                <input type="text" class="form-control" id="nohp" name="nohp" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-custom w-100">Tambah Data</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>