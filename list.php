<?php
$conn = new mysqli("localhost", "root", "", "kursus_pesawat");

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM peserta WHERE id = $id");
    header("Location: list.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $conn->query("UPDATE peserta SET nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' WHERE id = $id");
    header("Location: list.php");
}

$peserta = $conn->query("SELECT * FROM peserta");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Peserta</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #007BFF; color: #fff; }
        a, button { text-decoration: none; color: #fff; background: #007BFF; padding: 5px 10px; border-radius: 4px; cursor: pointer; }
        a:hover, button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>List Peserta Kursus Pesawat</h1>
    <a href="index.php">Tambah Peserta</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $peserta->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['telepon'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <a href="list.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus peserta ini?')">Hapus</a>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
