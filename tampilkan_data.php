<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nama: " . $row["name"]. " - Email: " . $row["email"]. " - Film: " . $row["movie"]. " - Status: " . $row["status"]. "<br>";
    }
} else {
    echo "0 hasil";
}
$conn->close();
?>
