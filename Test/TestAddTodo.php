<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testAddTodolist(): void
{
  $connection = \Config\Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);
  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");
}

try {
  testAddTodolist();
} catch (Exception $e) {
  echo "Error saat menambahkan todolist: " . $e->getMessage() . "\n";
}
