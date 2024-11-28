<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO barang (nama, kategori, harga, stok) VALUES ('$nama', '$kategori', '$harga', '$stok')";
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
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('bg4.jpg') no-repeat center center fixed; /* Ganti dengan path file gambar Anda */
            background-size: cover;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        form label {
            display: block;
            margin-top: 15px;
            color: #555555;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
        }
        form input:focus {
            outline: none;
            border-color: #007bff;
        }
        form button {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form action="tambah.php" method="POST">
            <label for="nama">Nama Barang:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori">

            <label for="harga">Harga:</label>
            <input type="number" step="0.01" id="harga" name="harga" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>

            <button type="submit">Tambah</button>
        </form>
    </div>
</body>
</html>
