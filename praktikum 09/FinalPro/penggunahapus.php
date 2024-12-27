<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM pengguna WHERE idpeng = $id";

    if ($conn->query($sql)) {
        header("Location: penggunaindex.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID tidak valid.";
}
?>