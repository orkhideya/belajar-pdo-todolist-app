<?php

namespace Service {

  use Entity\Todolist;
  use Repository\TodolistRepository;

  interface TodolistService
  {

    function showTodolist(): void;

    function addTodolist(string $todo): void;

    function removeTodolist(int $number): void;
  }

  class TodolistServiceImpl implements TodolistService
  {

    private TodolistRepository $todolistRepository;

    public function __construct(TodolistRepository $todolistRepository)
    {
      $this->todolistRepository = $todolistRepository;
    }

    function showTodolist(): void
    {
      echo "TODOLIST" . PHP_EOL;
      $todolist = $this->todolistRepository->findAll();
      $number = 1;
      foreach ($todolist as $value) {
        echo $number . ". " . $value->getTodo() . PHP_EOL;
        $number++;
      }
    }

    function addTodolist(string $todo): void
    {
      $todolist = new Todolist($todo);
      $this->todolistRepository->save($todolist);
      echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
    }

    function removeTodolist(int $number): void
    {
      $todolist = $this->todolistRepository->findAll();
      $index = $number - 1;

      if ($index < 0 || $index >= sizeof($todolist)) {
        echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
        return;
      }

      $id = $todolist[$index]->getId();

      if ($this->todolistRepository->remove($id)) {
        echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
      } else {
        echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
      }
    }
  }
}
