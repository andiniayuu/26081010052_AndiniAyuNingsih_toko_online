-- Studi kasus: Toko online
DROP DATABASE IF EXISTS toko_online;
CREATE DATABASE toko_online;
USE toko_online;

-- Tabel 1 (Master): kategori
CREATE TABLE kategori (
    id_kategori   INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50)  NOT NULL,
    deskripsi     VARCHAR(100) NOT NULL,
    lokasi_rak    VARCHAR(10)  NOT NULL
);

-- Tabel 2 (Master): produk  (1 kategori : banyak produk)
CREATE TABLE produk (
    id_produk   INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT NOT NULL,
    nama_produk VARCHAR(60) NOT NULL,
    harga       INT NOT NULL,
    stok        INT NOT NULL,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

-- Tabel 3 (Transaksi): penjualan  (1 produk : banyak penjualan)
CREATE TABLE penjualan (
    id_penjualan INT AUTO_INCREMENT PRIMARY KEY,
    id_produk    INT NOT NULL,
    nama_pembeli VARCHAR(50) NOT NULL,
    jumlah       INT NOT NULL,
    tanggal      DATE NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

-- Data awal (5 baris per tabel)
INSERT INTO kategori (nama_kategori, deskripsi, lokasi_rak) VALUES
('Makanan Ringan', 'Keripik dan biskuit',        'A1'),
('Minuman',        'Air mineral, teh, kopi',     'B1'),
('Sembako',        'Beras, minyak, gula',        'C1'),
('Alat Tulis',     'Pulpen dan buku tulis',      'D1'),
('Kebersihan',     'Sabun dan deterjen',         'E1');

INSERT INTO produk (id_kategori, nama_produk, harga, stok) VALUES
(1, 'Keripik Singkong',     8000,  40),
(2, 'Air Mineral 600 ml',   3500, 120),
(3, 'Beras 5 kg',          72000,  25),
(4, 'Buku Tulis',           4500, 100),
(5, 'Sabun Mandi',          4000,  70);

INSERT INTO penjualan (id_produk, nama_pembeli, jumlah, tanggal) VALUES
(1, 'Budi',  2, '2026-10-01'),
(2, 'Siti',  6, '2026-10-02'),
(3, 'Rudi',  1, '2026-10-03'),
(4, 'Dewi', 10, '2026-10-04'),
(5, 'Andi',  3, '2026-10-05');

-- ===== Contoh query =====
-- SELECT * FROM produk WHERE stok < 50;
-- SELECT p.nama_produk, k.nama_kategori FROM produk p JOIN kategori k ON p.id_kategori = k.id_kategori;
-- UPDATE produk SET harga = 9000 WHERE id_produk = 1;
-- DELETE FROM penjualan WHERE id_penjualan = 5;