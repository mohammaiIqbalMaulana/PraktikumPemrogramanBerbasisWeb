<?php
session_start();
$title = "Profile";
include 'includes/main_header.php'; // Menggunakan header utama
?>

<div class="container text-center">
    <h1 class="mb-4">Profil Pengembang</h1>
    <hr>
    <img src="Images/pp.jpg" alt="Profile Picture" class="profile-image mb-4">
    
    <div class="card p-4 mx-auto" style="max-width: 600px;">
        <p>Halo! Nama saya **Mohammad Iqbal Maulana**, seorang mahasiswa Informatika yang bersemangat dalam pengembangan web dan teknologi informasi.</p>
        <p>Saya sedang menempuh pendidikan di salah satu universitas terkemuka dan terus belajar untuk meningkatkan keterampilan saya di bidang ini.</p>
        <p>Proyek ini adalah bagian dari tugas perkuliahan untuk membangun sistem manajemen data mahasiswa menggunakan PHP dan MySQL, dengan fokus pada praktik terbaik dalam struktur kode dan antarmuka pengguna.</p>
        <p>Terima kasih telah mengunjungi halaman profil saya!</p>
    </div>
</div>

<?php include 'includes/footer.php'; // Menggunakan footer utama ?>