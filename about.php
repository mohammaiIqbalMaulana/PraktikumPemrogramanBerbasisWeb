<?php
session_start();
$title = "About Us";
include 'includes/main_header.php'; // Menggunakan header utama
?>

<div class="container">
    <h1 class="text-center">ABOUT</h1>
    <hr>

    <h2 class="text-center mb-4">Data Mahasiswa Informatika 2023 Kelas B</h2>
    
    <div class="table-responsive mb-5">
        <table class="data-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="NO">1</td>
                    <td data-label="Nama">Mohammad Iqbal Maulana</td>
                    <td data-label="NIM">C2C023061</td>
                    <td data-label="Status">Aktif</td>
                </tr>
                <tr>
                    <td data-label="NO">2</td>
                    <td data-label="Nama">Fariel Dzaky Yugisaputra</td>
                    <td data-label="NIM">C2C023053</td>
                    <td data-label="Status">Aktif</td>
                </tr>
                <tr>
                    <td data-label="NO">3</td>
                    <td data-label="Nama">Maydatul Karomah</td>
                    <td data-label="NIM">C2C023064</td>
                    <td data-label="Status">Aktif</td>
                </tr>
                <tr>
                    <td data-label="NO">4</td>
                    <td data-label="Nama">M. Rikza Rizqi Al Azka</td>
                    <td data-label="NIM">C2C0231070</td>
                    <td data-label="Status">Aktif</td>
                </tr>
                <tr>
                    <td data-label="NO">5</td>
                    <td data-label="Nama">Nesya Meilita Andari</td>
                    <td data-label="NIM">C2C023054</td>
                    <td data-label="Status">Aktif</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2 class="text-center mb-4">Latihan Nilai Mahasiswa</h2>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th rowspan="2">Nama</th>
                    <th colspan="3">Nilai</th>
                </tr>
                <tr>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Tugas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Nama">Mohammad Iqbal Maulana</td>
                    <td data-label="UTS">90</td>
                    <td data-label="UAS">100</td>
                    <td data-label="Tugas">80</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; // Menggunakan footer utama ?>