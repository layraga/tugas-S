<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kos-Kosan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistem Informasi Kos-Kosan</h1>
            <marquee>Selamat datang di Sistem Informasi Kos-Kosan. Kelola data kos-kosan Anda dengan mudah dan cepat!</marquee>
        </header>

        <nav class="sidebar">
            <h2>Sidebar Menu</h2>
            <ul>
                <li>
                    <a href="#">Pendataan</a>
                    <ul>
                        <li><a href="penggunaindex.php">Data Pengguna</a></li>
                        <li><a href="modules/pendataan/penghuni.php">Data Penghuni</a></li>
                        <li><a href="modules/pendataan/pondokan.php">Data Kos/Pondokan</a></li>
                        <li><a href="modules/pendataan/kamar.php">Data Kamar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Transaksi</a>
                    <ul>
                        <li><a href="modules/transaksi/registrasi.php">Registrasi</a></li>
                        <li><a href="modules/transaksi/pembayaran.php">Pembayaran</a></li>
                        <li><a href="modules/transaksi/penghuni_keluar.php">Penghuni Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Laporan</a>
                    <ul>
                        <li><a href="modules/laporan/daftar_pengguna.php">Daftar Pengguna</a></li>
                        <li><a href="modules/laporan/daftar_penghuni.php">Daftar Penghuni</a></li>
                        <li><a href="modules/laporan/rekap_penghuni.php">Rekapitulasi Penghuni</a></li>
                        <li><a href="modules/laporan/daftar_pondokan.php">Daftar Kos/Pondokan</a></li>
                        <li><a href="modules/laporan/daftar_kamar.php">Daftar Kamar</a></li>
                        <li><a href="modules/laporan/daftar_registrasi.php">Daftar Registrasi</a></li>
                        <li><a href="modules/laporan/rekap_registrasi.php">Rekapitulasi Registrasi</a></li>
                        <li><a href="modules/laporan/daftar_pembayaran.php">Daftar Pembayaran</a></li>
                        <li><a href="modules/laporan/rekap_pembayaran.php">Rekapitulasi Pembayaran</a></li>
                        <li><a href="modules/laporan/daftar_penghuni_keluar.php">Daftar Penghuni Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <main>
            <h2>Dashboard</h2>
            <img src="Gambarkos.jpg" alt="Kos-Kosan" class="dashboard-image">
            <p>Selamat datang di dashboard Sistem Informasi Kos-Kosan. Pilih menu di samping untuk mengelola data Anda.</p>
        </main>

        <footer>
            <p>&copy; 2024 Sistem Informasi Kos-Kosan. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>