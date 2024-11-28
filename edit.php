<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM barang WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE barang SET nama='$nama', kategori='$kategori', harga='$harga', stok='$stok' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('bg7.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-container label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            background: #74ebd5;
            color: white;
            border: none;
            padding: 10px 15px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container button:hover {
            background: #56c6ac;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Barang</h1>
        <form action="edit.php?id=<?= $id; ?>" method="POST">
            <label>Nama Barang:</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
            
            <label>Kategori:</label>
            <input type="text" name="kategori" value="<?= $row['kategori']; ?>">
            
            <label>Harga:</label>
            <input type="number" step="0.01" name="harga" value="<?= $row['harga']; ?>" required>
            
            <label>Stok:</label>
            <input type="number" name="stok" value="<?= $row['stok']; ?>" required>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

