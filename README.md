# Toko online

Nama: Andini Ayu Ningsih
Prodi: Informatika
NPM: 26081010052

Web online PHP + MySQL yang menampilkan 3 tabel: kategori, produk, dan penjualan.

## Struktur

```
toko_online_/
├── services/config.php    # koneksi database
├── database/schema.sql    # struktur + data + contoh query
├── index.php              # halaman utama
├── style.css              # tampilan
└── README.md
```

## Cara Menjalankan

1. Nyalakan Apache dan MySQL di XAMPP.
2. Salin folder ke `htdocs`.
3. Import `database/schema.sql` lewat phpMyAdmin.
4. Buka `http://localhost/toko_online_/`.

## Entitas dan Atribut

- **kategori**: id_kategori (PK), nama_kategori, deskripsi, lokasi_rak
- **produk**: id_produk (PK), id_kategori (FK), nama_produk, harga, stok
- **penjualan**: id_penjualan (PK), id_produk (FK), nama_pembeli, jumlah, tanggal

## Relasi dan Kardinalitas

- kategori → produk: **One-to-Many** (1 kategori punya banyak produk)
- produk → penjualan: **One-to-Many** (1 produk bisa terjual berkali-kali)

```
kategori 1 ----< produk 1 ----< penjualan
```

## Contoh Query

```sql
SELECT * FROM produk WHERE stok < 50;

SELECT p.nama_produk, k.nama_kategori
FROM produk p JOIN kategori k ON p.id_kategori = k.id_kategori;

UPDATE produk SET harga = 9000 WHERE id_produk = 1;

DELETE FROM penjualan WHERE id_penjualan = 5;
```
