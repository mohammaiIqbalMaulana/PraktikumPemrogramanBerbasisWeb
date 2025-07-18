<?php
require 'function.php';

if (isset($_POST["register"])) {
    $message = register($_POST);

    if ($message === "Register Berhasil") {
        echo "
                <script>
                    alert('" . addslashes($message) . "');
                    document.location.href='login.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('" . addslashes($message) . "');
                     document.location.href='register.php';
                </script>
            ";
    }
}

$title = "Register";
include 'includes/auth_header.php'; // Menggunakan header khusus otentikasi
?>

<div class="auth-container"> <!-- Tambahkan div pembungkus ini -->
    <div class="card">
        <h2 class="text-center mb-4">Registrasi Akun</h2>
        <form action="" method="post"> <!-- enctype="multipart/form-data" tidak diperlukan untuk form register -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password:</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password" required>
            </div>
            <button type="submit" name="register" class="btn-custom">Daftar Sekarang</button>

            <div class="text-center mt-3">
                <p>Sudah punya akun? <a href="login.php" class="auth-link">Login disini</a></p>
            </div>
        </form>
    </div>
</div> <!-- Tutup div pembungkus ini -->

<?php include 'includes/footer.php'; // Menggunakan footer utama ?>