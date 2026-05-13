<?php

namespace Config;

use PDO;

class Database
{
  static function getConnection(): PDO
  {
    $host = 'localhost';
    $db   = 'todolist';
    $port = 3306;
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    try {
      $pdo = new PDO("mysql:host=$host; dbname=$db; port=$port; charset=$charset", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    } catch (\PDOException $e) {
      throw new \Exception("Database connection failed: " . $e->getMessage());
    }
  }
}
