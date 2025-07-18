<?php
session_start(); // Pastikan session dimulai jika diperlukan
$title = "Home";
include 'includes/main_header.php'; // Menggunakan header utama
?>

<div class="container">
    <h1 class="text-center">WEB INFORMATIKA 2023</h1>
    <hr>

    <div class="teras">
        <div class="container-teras">
            <div class="taman">
                <img src="https://images.bisnis.com//upload/img/solo_leveling.jpg" alt="Solo Leveling Image"/>
            </div>
            <div class="kolam">
                <p>Area Kolam</p>
            </div>
            <div class="parkiran">
                <p>Area Parkiran</p>
            </div>
            <div class="rak">
                <p>Area Rak</p>
            </div>
        </div>
    </div>

    <div class="rumah">
        <h2 class="text-center">Selamat Datang di Website Informatika!</h2>
        <p>Website ini dibuat sebagai proyek untuk menampilkan data mahasiswa dan informasi terkait program studi Informatika.</p>
    </div>

    <div class="dapur">
        <h2 class="text-center">Berita Terbaru</h2>
        <p>
            <b>They say whatever doesn’t kill you makes you stronger, but that’s not the case for the world’s weakest hunter <i>Sung Jinwoo.</i></b> <i>After being brutally slaughtered by monsters in a high-ranking dungeon, Jinwoo came back with the System, <br> a program only he could see, that’s leveling him up in every way. <u>Now, he’s inspired to discover the secrets behind his powers and the dungeon that spawned them.</u></i>
        </p>

        <p><b>Daftar Karakter Setiap Episode : </b></p>
        <ul>
            <li>Episode 1</li>
            <ol>
                <li>Sung Jinwoo</li>
                <li>Lee Johee</li>
                <li>Min Byung-Gyu</li>
                <li>Eunseok</li>
                <li>Baek Yoonho</li>
            </ol>
            <li>Episdoe 2</li>
            <ol>
                <li>Song Chi-Yul</li>
                <li>Joo Jae-Hwan</li>
            </ol>
        </ul>
    </div>
</div>

<?php include 'includes/footer.php'; // Menggunakan footer utama ?>