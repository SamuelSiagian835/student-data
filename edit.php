<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai inputan dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prody = $_POST['prody'];

    // Mengupdate data di dalam tabel mahasiswa
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prody='$prody' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Mengarahkan pengguna ke halaman simpan.php setelah data berhasil diperbarui
        header("Location: simpan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Mengecek apakah parameter id ada pada URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Mengambil data mahasiswa berdasarkan id
        $sql = "SELECT * FROM mahasiswa WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
            $nim = $row['nim'];
            $prody = $row['prody'];
        } else {
            echo "Data mahasiswa tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID mahasiswa tidak ditemukan.";
        exit;
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="<?php echo $nama; ?>" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" value="<?php echo $nim; ?>" required>
            </div>

            <div class="form-group">
                <label for="prody">Program Studi:</label>
                <input type="text" name="prody" value="<?php echo $prody; ?>" required>
            </div>
 
            <input type="submit" value="Simpan" onclick="location.href='simpan.php';">
        </form>
    </div>
</body>
</html>
