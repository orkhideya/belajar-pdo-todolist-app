# Belajar PDO - Todolist App

Ini adalah proyek latihan membuat aplikasi todolist sederhana berbasis CLI menggunakan PHP dan PDO. Tujuan utamanya adalah belajar cara mengakses database dengan PDO sekaligus mencoba menerapkan arsitektur berlapis agar kode tidak campur aduk.

Fitur yang ada cukup sederhana, pengguna bisa menambah, menghapus, dan melihat daftar todo yang disimpan di database MySQL lewat terminal.

## Arsitektur

Proyek ini memisahkan kode ke dalam beberapa lapisan.

**Entity** adalah representasi data todo dalam bentuk objek, berisi id dan teks todo.

**Repository** mengurus semua operasi ke database. Query ditulis menggunakan PDO prepared statement agar terhindar dari SQL Injection.

**Service** berisi logika aplikasinya, misalnya memastikan nomor todo yang ingin dihapus memang ada sebelum diteruskan ke Repository.

**View** mengurus tampilan di terminal. Menampilkan daftar todo dan menu pilihan secara berulang sampai pengguna keluar.

**Helper** berisi fungsi kecil untuk membaca input dari pengguna di terminal.

Semua lapisan ini dihubungkan di `App.php` lewat dependency injection melalui constructor, sehingga tiap lapisan tidak perlu tahu detail implementasi lapisan lain.

## Cara Menjalankan

Pastikan sudah ada PHP dan MySQL yang berjalan di lokal, misalnya lewat XAMPP atau Laragon.

### Membuat Database

Buka phpMyAdmin atau MySQL lewat terminal, lalu jalankan query berikut satu per satu.

```sql
CREATE DATABASE todolist;

USE todolist;

CREATE TABLE todolistpdo (
    id   INT          NOT NULL AUTO_INCREMENT,
    todo VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
```

### Konfigurasi Koneksi

Salin file konfigurasi database yang tersedia.

```
copy Config\Database.example.php Config\Database.php
```

Buka `Config/Database.example.php` lalu sesuaikan nilai berikut dengan pengaturan lokal.

```php
$host = 'localhost';
$db   = 'todolist';
$user = 'root';
$pass = '';
```

### Menjalankan Aplikasi

```
php App.php
```

Kalau ingin memastikan koneksi ke database berhasil dulu sebelum menjalankan aplikasi utama, pakai file ini.

```
php Test/test-connection.php
```
