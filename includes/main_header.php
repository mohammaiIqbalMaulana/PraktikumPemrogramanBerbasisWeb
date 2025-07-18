<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Mahasiswa' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link ke style.css -->
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container"> <!-- Container ini akan diatur max-width-nya di CSS -->
        <a class="navbar-brand text-white fw-bold" href="index.php">INFORMATIKA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto"> <!-- me-auto akan mendorong item ke kiri -->
                <li class="nav-item">
                    <a class="nav-link text-white <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" 
                       href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= basename($_SERVER['PHP_SELF']) == 'datamahasiswa.php' ? 'active' : '' ?>" 
                       href="datamahasiswa.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>" 
                       href="about.php">About</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['login'])): ?>
                <div class="logout-btn-container"> <!-- Container terpisah untuk tombol logout -->
                    <a class="logout-btn" href="logout.php">Logout</a>
                </div>
            <?php else: ?>
                <ul class="navbar-nav"> <!-- Untuk tombol Login/Register jika belum login -->
                    <li class="nav-item">
                        <a class="nav-link text-white <?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>" 
                           href="login.php">Login</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>