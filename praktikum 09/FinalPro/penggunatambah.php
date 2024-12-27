<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namapeng = $_POST['namapeng']; 
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Validasi input
    if (empty($namapeng) || empty($alamat) || empty($email) || empty($username) || empty($password)) {
        echo "Semua field harus diisi.";
        exit();
    }

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("INSERT INTO pengguna (namapeng, alamat, nohp, email, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $namapeng, $alamat, $nohp, $email, $username, $password);

    if ($stmt->execute()) {
        header("Location: penggunaindex.php");
        exit();
    } else {
        echo "Error: " . $stmt->error; 
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="penggunastyle.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Pengguna</h1>
        <form action="" method="post">
            <label for="namapeng">Nama Lengkap:</label>
            <input type="text" name="namapeng" required>

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" required></textarea>

            <label for="nohp">Nomor HP:</label>
            <input type="tel" name="nohp" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-simpan">Simpan</button>
        </form>
    </div>
</body>
</html>