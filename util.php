<?php

// Set up the database connection and start session
function configSession() {
  if (!isset($db)) {
    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'alfar_db1');
    global $db;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Cannot connect to database');
  }

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
}

?>
