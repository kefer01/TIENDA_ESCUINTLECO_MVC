<?php

function conectarDB() {
    $servidor = $_ENV['DB_HOST'];
    $database = $_ENV['DB_BD'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    try {
        $db = new PDO("sqlsrv:server=$servidor;database=$database", $user, $password);
        return $db;
    } catch (PDOException $e) {
        die("Error no se pudo conectar ". $e->getMessage());
    }
}

?>