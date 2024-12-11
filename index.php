<?php
$conn = new mysqli("localhost", "root", "", "kursus_pesawat");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $conn->query("INSERT INTO peserta (nama, email, telepon, alamat) VALUES ('$nama', '$email', '$telepon', '$alamat')");
    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Kursus Pesawat</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        form { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Pendaftaran Kursus Pesawat</h1>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Telepon:</label>
        <input type="text" name="telepon" required>
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
