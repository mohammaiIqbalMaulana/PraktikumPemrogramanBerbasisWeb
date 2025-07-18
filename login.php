<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: datamahasiswa.php");
    exit;
}

require 'function.php';
$error = false;

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["login"] = $user["id"];
            header("Location: datamahasiswa.php");
            exit;
        }
    }

    $error = true;
}

$title = "Login";
include 'includes/auth_header.php'; // Menggunakan header khusus otentikasi
?>

<div class="auth-container"> <!-- Tambahkan div pembungkus ini -->
    <div class="card">
        <h2 class="text-center mb-4">Login Akun</h2>
        <form action="" method="post"> <!-- enctype="multipart/form-data" tidak diperlukan untuk form login -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <?php if ($error) : ?>
                <div class="auth-alert text-center mb-3">
                    <strong>Login gagal!</strong><br>Username atau password salah.
                </div>
            <?php endif; ?>

            <button type="submit" name="login" class="btn-custom">Login</button>

            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="register.php" class="auth-link">Register disini</a></p>
            </div>
        </form>
    </div>
</div> <!-- Tutup div pembungkus ini -->

<?php include 'includes/footer.php';?>