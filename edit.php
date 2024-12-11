<?php
$conn = new mysqli("localhost", "root", "", "kursus_pesawat");
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM peserta WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $conn->query("UPDATE peserta SET nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' WHERE id = $id");
    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        form { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Edit Peserta</h1>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required>
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= $data['telepon'] ?>" required>
        <label>Alamat:</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
