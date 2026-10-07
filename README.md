# Toko Online

Web sederhana PHP + MySQL yang menampilkan 3 tabel: kategori, produk, dan penjualan.

- **Nama:** Andini Ayu Ningsih
- **NPM:** 26081010052

## Struktur Proyek
```
toko_online/
├── services/config.php    # koneksi database
├── database/schema.sql    # struktur + data + contoh query
├── index.php              # halaman utama
├── style.css              # tampilan
└── README.md
```

## Cara Menjalankan (Laragon)
1. Buka **Laragon**, lalu klik **Start All** sampai Apache dan MySQL berjalan.
2. Letakkan folder proyek di `C:\laragon\www\toko_online`.
   Pastikan `index.php` langsung ada di dalam folder tersebut.
3. Buka **phpMyAdmin** (`http://localhost/phpmyadmin`) lewat menu Laragon (**Database**) atau browser.
   - Login dengan user `root`, password kosong.
4. Klik tab **Import**, pilih file `database/schema.sql`, lalu klik **Import**.
   Database `toko_online` beserta 3 tabelnya akan terbuat otomatis.
5. Cek `services/config.php`. Pastikan `$database = "toko_online";`
   dan sesuaikan `user`/`password` bila berbeda.
6. Buka di browser: `http://localhost/toko_online/`
   (atau `http://toko_online.test` jika auto virtual host Laragon aktif).

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
-- SELECT
SELECT * FROM produk WHERE stok < 50;

-- JOIN
SELECT p.nama_produk, k.nama_kategori
FROM produk p JOIN kategori k ON p.id_kategori = k.id_kategori;

-- UPDATE
UPDATE produk SET harga = 9000 WHERE id_produk = 1;

-- DELETE
DELETE FROM penjualan WHERE id_penjualan = 5;
```
