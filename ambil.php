<?php
// Koneksi ke database
$pdo = new PDO('mysql:host=localhost;dbname=latihan', 'root', 'samuel123');

// Perintah SQL untuk mengambil data
$sql = "SELECT * FROM mahasiswa";

// Eksekusi perintah SQL
$result = $pdo->query($sql);

// Tampilkan data ke layar
if ($result) {
    echo '<table>';
    echo '<tr><th>Nama</th><th>NIM</th><th>Program Studi</th></tr>';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['nama'] . '</td>';
        echo '<td>' . $row['nim'] . '</td>';
        echo '<td>' . $row['prody'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Gagal mengambil data dari database.';
}
?>
