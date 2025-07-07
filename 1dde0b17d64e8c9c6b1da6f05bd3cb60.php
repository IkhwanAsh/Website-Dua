<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda jika ada
$dbname = "tiket_bioskop";
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?><?php /**PATH C:\xampp\htdocs\blajar_laravel\blajar_laravel\resources\views/koneksi.blade.php ENDPATH**/ ?>