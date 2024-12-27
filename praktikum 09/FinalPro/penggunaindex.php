<?php
include 'config.php'; // Menyertakan koneksi database

// Mengambil data dari tabel pengguna
$sql = "SELECT * FROM pengguna";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="penggunastyle.css">
</head>
<body>
    <div class="container">
        <h1>Data Pengguna</h1>
        <a href="penggunatambah.php" class="btn-tambah">Tambah Pengguna</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['idpeng']); ?></td>
                    <td><?php echo htmlspecialchars($row['namapeng']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($row['nohp']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['nmuser']); ?></td>
                    <td>
                        <a href="penggunaedit.php?id=<?php echo $row['idpeng']; ?>" class="button-edit">Edit</a>
                        <a href="penggunahapus.php?id=<?php echo $row['idpeng']; ?>" class="button-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>