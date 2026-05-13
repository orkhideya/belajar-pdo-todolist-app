<?php

require_once '../Config/database.php';

use Config\Database;

try {
  $pdo = Database::getConnection();
  echo "Database connection successful!\n";
} catch (Exception $e) {
  echo "Database connection failed: " . $e->getMessage() . "\n";
}
