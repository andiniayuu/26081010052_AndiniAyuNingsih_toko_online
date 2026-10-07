<?php
include "services/config.php";

// Query SELECT untuk 3 tabel
$kategori  = $conn->query("SELECT * FROM kategori");

$produk    = $conn->query("SELECT p.id_produk, p.nama_produk, k.nama_kategori, p.harga, p.stok
                           FROM produk p
                           JOIN kategori k ON p.id_kategori = k.id_kategori");

$penjualan = $conn->query("SELECT s.id_penjualan, s.tanggal, s.nama_pembeli, p.nama_produk, s.jumlah
                           FROM penjualan s
                           JOIN produk p ON s.id_produk = p.id_produk");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Online</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="navbar">
        <h1>Toko Online</h1>
        <div>
            <a href="#kategori">Kategori</a>
            <a href="#produk">Produk</a>
            <a href="#penjualan">Penjualan</a>
        </div>
    </div>

    <div class="container">

        <!-- Tabel 1: Kategori -->
        <div class="card" id="kategori">
            <h2>Data Kategori</h2>
            <div class="scroll">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Rak</th>
                    </tr>
                    <?php while ($row = $kategori->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id_kategori'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td><?= $row['lokasi_rak'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Tabel 2: Produk -->
        <div class="card" id="produk">
            <h2>Data Produk</h2>
            <div class="scroll">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                    <?php while ($row = $produk->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id_produk'] ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td><?= $row['stok'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Tabel 3: Penjualan -->
        <div class="card" id="penjualan">
            <h2>Data Penjualan</h2>
            <div class="scroll">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                    </tr>
                    <?php while ($row = $penjualan->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id_penjualan'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['nama_pembeli'] ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>

</body>

</html>