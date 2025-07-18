<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    if (ubahdata($_POST, $_FILES, $id) > 0) {
        header("Location: datamahasiswa.php?status=success&message=Data+berhasil+diubah");
        exit;
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
    }
}

$title = "Ubah Data Mahasiswa";
include 'includes/main_header.php';
?>

<div class="container d-flex justify-content-center">
    <div class="card p-4 mt-5">
        <h2 class="text-center mb-4">Ubah Data Mahasiswa</h2>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto"> <!-- Foto tidak wajib diubah -->
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                <?php if ($mhs['foto']): ?>
                    <img src="images/<?= $mhs['foto'] ?>" width="100" class="mt-2" style="border-radius: 5px;">
                <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($mhs["nama"]) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($mhs["nim"]) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= htmlspecialchars($mhs["jurusan"]) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="nohp" class="form-label">No HP:</label>
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= htmlspecialchars($mhs["nohp"]) ?>" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-custom w-100">Ubah Data</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>