<?php
require_once __DIR__ . '/../Config/database.php';
require_once __DIR__ . '/../Entity/Todolist.php';
require_once __DIR__ . '/../Repository/TodolistRepository.php';

use Config\Database;
use Repository\TodolistRepositoryImpl;
use Entity\Todolist;

try {
  // Koneksi ke database
  $pdo = Database::getConnection();

  // Inisialisasi repository
  $repository = new TodolistRepositoryImpl($pdo);

  // Ambil semua todolist
  $allTodos = $repository->findAll();

  // Tampilkan semua todolist
  echo "Daftar Todolist:\n";
  foreach ($allTodos as $index => $todo) {
    echo ($index + 1) . ". " . $todo['todo'] . "\n";
  }
} catch (Exception $e) {
  echo "Error saat menampilkan todolist: " . $e->getMessage() . "\n";
}
