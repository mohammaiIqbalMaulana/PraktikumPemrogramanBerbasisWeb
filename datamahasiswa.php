<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
$title = "Data Mahasiswa";
include 'includes/main_header.php';
?>

<div class="container d-flex justify-content-center">
    <div class="card p-4 mt-5" style="max-width: 900px; width: 100%;">
        <h2 class="text-center mb-4">Data Mahasiswa</h2>
        
        <a href="tambahdata.php" class="btn btn-custom mb-4">Tambah Data</a>
        
        <div class="table-responsive">
            <table class="data-table w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($mahasiswa as $mhs): ?>
                    <tr>
                        <td data-label="No"><?= $i++; ?></td>
                        <td data-label="Foto"><img src="images/<?= $mhs['foto'] ?>" width="60" style="border-radius: 5px;"></td>
                        <td data-label="Nama"><?= htmlspecialchars($mhs['nama']) ?></td>
                        <td data-label="NIM"><?= htmlspecialchars($mhs['nim']) ?></td>
                        <td data-label="Jurusan"><?= htmlspecialchars($mhs['jurusan']) ?></td>
                        <td data-label="No HP"><?= htmlspecialchars($mhs['nohp']) ?></td>
                        <td data-label="Aksi">
                            <a href="ubahdata.php?id=<?= $mhs['id'] ?>" class="btn btn-sm edit-btn">Edit</a>
                            <a href="hapusdata.php?id=<?= $mhs['id'] ?>" class="btn btn-sm delete-btn" 
                               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>