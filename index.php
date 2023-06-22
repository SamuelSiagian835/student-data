<!DOCTYPE html>
<html>
<head>
    <title>Formulir Mahasiswa</title>
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
        <h2>Formulir Mahasiswa</h2>
        <form action="simpan.php" method="POST">
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" required>
            </div>

            <div class="form-group">
                <label for="prody">Program Studi:</label>
                <input type="text" name="prody" required>
            </div>
 
            <input type="submit" value="Simpan">
            <ul>
            <a href="simpan.php">
        <button type="button">DAFTAR MAHASISWA</button>
    </a>

        </ul>
            
        </form> 
    </div>
</body>

</html>


