<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$row = null;

// Ambil data berdasarkan ID jika ada
if ($id) {
    $sql = "SELECT * FROM tb_pegawai_23230014 WHERE ID Pegawai = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Data tidak ditemukan!");
    }
}

// Proses simpan perubahan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID_Pegawai = $_POST['ID Pegawai'];
    $Nama_Pegawai = $_POST['Nama Pegawai'];
    $Tanggal_Lahir = $_POST['Tanggal Lahir'];
    $Jenis_Kelamin = $_POST['Jenis Kelamin'];
    $Golongan = $_POST['Golongan'];
    $Gaji = $_POST['Gaji'];

    if ($id) {
        // Update data
        $stmt = $conn->prepare("UPDATE tb_pegawai_23230014 SET Nama Pegawai = ?, Tanggal_Lahir = ?, Jenis Kelamin = ?, Golongan = ?, Gaji = ? WHERE ID_Pegawai = ?");
        $stmt->bind_param("ssssdi", $Nama_Pegawai, $Tanggal_Lahir, $Jenis_Kelamin, $Golongan, $Gaji, $ID_Pegawai);
    } else {
        // Tambah data baru
        $stmt = $conn->prepare("INSERT INTO tb_pegawai_23230014 (ID Pegawai, Nama Pegawai, Tanggal Lahir, Jenis Kelamin, Golongan, Gaji) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssd", $ID_Pegawai, $Nama_Pegawai, $Tanggal_Lahir, $Jenis_Kelamin, $Golongan, $Gaji);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $id ? "Edit Data" : "Tambah Data"; ?> Pegawai</title>
    <style>
        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 10px;
        }
    </style>
</head>
<body bgcolor="cyan"> 

<h2 style="text-align: center;"><?php echo $id ? "Edit Data" : "Tambah Data"; ?> Pegawai</h2>
<form method="POST">
    <table>
        <tr>
            <td>ID Pegawai:</td>
            <td><input type="text" name="ID Pegawai" value="<?php echo $row ? htmlspecialchars($row['ID Pegawai']) : ''; ?>" required></td>
        </tr>
        <tr>
            <td>Nama Pegawai:</td>
            <td><input type="text" name="Nama Pegawai" value="<?php echo $row ? htmlspecialchars($row['Nama Pegawai']) : ''; ?>" required></td>
        </tr>
        <tr>
            <td>Tanggal Lahir:</td>
            <td><input type="date" name="Tanggal Lahir" value="<?php echo $row ? htmlspecialchars($row['Tanggal Lahir']) : ''; ?>" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin:</td>
            <td>
                <select name="Jenis Kelamin" required>
                <option value="L" <?php echo $row && $row['Jenis Kelamin'] == 'L' ? 'selected' : ''; ?>>L</option>
                <option value="P" <?php echo $row && $row['Jenis Kelamin'] == 'P' ? 'selected' : ''; ?>>P</option>
            </tr>
                </select>
            </td>
        </tr>
        <tr>
            <td>Golongan:</td>
            <td>
            <select name="Golongan" required>
                    <option value="I/A" <?php echo $row && $row['Golongan'] == 'I/A' ? 'selected' : ''; ?>>I/A</option>
                    <option value="II/D" <?php echo $row && $row['Golongan'] == 'II/D' ? 'selected' : ''; ?>>II/D</option>
                    <option value="III/A" <?php echo $row && $row['Golongan'] == 'III/A' ? 'selected' : ''; ?>>III/A</option>
                    <option value="III/B" <?php echo $row && $row['Golongan'] == 'III/B' ? 'selected' : ''; ?>>III/B</option>
                    <option value="III/C" <?php echo $row && $row['Golongan'] == 'III/C' ? 'selected' : ''; ?>>III/C</option>
                    <option value="III/D" <?php echo $row && $row['Golongan'] == 'III/D' ? 'selected' : ''; ?>>III/D</option>
                </select>
        </tr>
        <tr>
            <td>Gaji:</td>
            <td><input type="number" step="0.01" name="Gaji" value="<?php echo $row ? htmlspecialchars($row['Gaji']) : ''; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="<?php echo $id ? "Update" : "Simpan"; ?>">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
