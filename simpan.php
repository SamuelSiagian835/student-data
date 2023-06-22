<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <?php
    // Memeriksa apakah array key "nama", "nim", dan "prody" ada dalam array $_POST
    if (isset($_POST['nama']) && isset($_POST['nim']) && isset($_POST['prody'])) {
        // Mendapatkan nilai inputan dari form
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $prody = $_POST['prody'];

        // Melakukan koneksi ke database (ganti dengan informasi koneksi sesuai dengan basis data Anda)
        $servername = "localhost";
        $username = "root";
        $password = "samuel123";
        $dbname = "latihan";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menyimpan data ke dalam tabel mahasiswa
        $sql = "INSERT INTO mahasiswa (nama, nim, prody) VALUES ('$nama', '$nim', '$prody')";

        if ($conn->query($sql) === TRUE) {
            // echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Menutup koneksi ke database
        $conn->close();
    } 

    // Melakukan koneksi ke database (ganti dengan informasi koneksi sesuai dengan basis data Anda)
    $servername = "localhost";
    $username = "root";
    $password = "samuel123";
    $dbname = "latihan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menampilkan data mahasiswa yang telah disimpan
    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Data Mahasiswa</h2>";
        echo "<table>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["nama"]."</td>
                    <td>".$row["nim"]."</td>
                    <td>".$row["prody"]."</td>
                    <td>
                        <a href='edit.php?id=".$row["id"]."'>Edit</a>
                        <a href='hapus.php?id=".$row["id"]."'>Hapus</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data mahasiswa.";
    }

    // Menutup koneksi ke database
    $conn->close();
    ?>
    <a href="index.php">
        <button type="button">BACK</button>
    </a>

</body>
</html>
