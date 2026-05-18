<?php

namespace Config;

use PDO;

/**
 * ================================================================
 * FILE INI ADALAH TEMPLATE / CONTOH KONFIGURASI DATABASE
 * ================================================================
 *
 * CARA SETUP:
 * 1. Salin file ini menjadi "Database.php" (di folder yang sama)
 *    Perintah: copy Database.example.php Database.php
 *
 * 2. Sesuaikan nilai di bawah dengan konfigurasi lokal kamu
 *    (host, nama database, username, password)
 *
 * 3. JANGAN commit file Database.php ke Git!
 *    (sudah dikecualikan di .gitignore)
 * ================================================================
 */
class Database
{
  static function getConnection(): PDO
  {
    // Ganti dengan nama host database kamu (biasanya 'localhost')
    $host = 'localhost';

    // Ganti dengan nama database yang sudah kamu buat di MySQL
    $db   = 'todolist';

    // Port MySQL (default: 3306, jangan diubah jika tidak perlu)
    $port = 3306;

    // Ganti dengan username MySQL kamu (default XAMPP: 'root')
    $user = 'root';

    // Ganti dengan password MySQL kamu (default XAMPP: '' kosong)
    $pass = '';

    $charset = 'utf8mb4';

    try {
      $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=$charset", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    } catch (\PDOException $e) {
      throw new \Exception("Database connection failed: " . $e->getMessage());
    }
  }
}
