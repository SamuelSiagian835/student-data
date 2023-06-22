<?php
$servername = "localhost";
$username = "root";
$password = "samuel123";
$dbname = "latihan";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $exception) {
  echo "Connection failed: " . $exception->getMessage();
  exit;
}

$id = $_GET['id'];

$deleteQuery = "DELETE FROM mahasiswa WHERE id = :id;";
$statement = $connection->prepare($deleteQuery);
$statement->execute(['id' => $id]);

header("Location: simpan.php");
