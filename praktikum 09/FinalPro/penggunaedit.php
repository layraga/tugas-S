<?php
include 'config.php';

$id = intval($_GET['id']);
$sql = "SELECT * FROM pengguna WHERE idpeng = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namapeng = $_POST['namapeng'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $nmuser = $_POST['nmuser'];
    $pasw = password_hash($_POST['pasw'], PASSWORD_DEFAULT); // Hash password

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("UPDATE pengguna SET namapeng = ?, alamat = ?, nohp = ?, email = ?, nmuser = ?, pasw = ? WHERE idpeng = ?");
    $stmt->bind_param("ssssssi", $namapeng, $alamat, $nohp, $email, $nmuser, $pasw, $id);

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
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="penggunastyle.css">
</head>
<body>
    <div class="pengguna-container">
        <h1>Edit Pengguna</h1>
        <form action="" method="post">
            <label>Nama: </label>
            <input type="text" name="namapeng" value="<?php echo htmlspecialchars($row['namapeng']); ?>" required>

            <label>Alamat: </label>
            <input type="text" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>

            <label>No HP:</label>
            <input type="text" name="nohp" value="<?php echo htmlspecialchars($row['nohp']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label>Username: </label>
            <input type="text" name="nmuser" value="<?php echo htmlspecialchars($row['nmuser']); ?>" required>

            <label>Password: </label>
            <input type="password" name="pasw" required>

            <button type="submit" class="button">Simpan</button>
        </form>
    </div>
</body>
</html>