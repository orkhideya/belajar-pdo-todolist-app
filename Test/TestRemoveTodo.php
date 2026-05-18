<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testRemoveTodolist(): void
{
    $connection         = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService    = new TodolistServiceImpl($todolistRepository);

    // Sesuaikan dengan id yang ada di database (1-4)
    $todolistService->removeTodolist(5); // GAGAL - tidak ada
    $todolistService->removeTodolist(4); // SUKSES
    $todolistService->removeTodolist(3); // SUKSES
    $todolistService->removeTodolist(2); // SUKSES
    $todolistService->removeTodolist(1); // SUKSES
}

try {
  testRemoveTodolist();
} catch (Exception $e) {
  echo "Error saat menghapus todolist: " . $e->getMessage() . "\n";
}
