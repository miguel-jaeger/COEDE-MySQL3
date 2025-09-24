<?php
// Este archivo debe ser el primer script que se ejecute.
// No debe haber nada antes de la etiqueta <?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $db   = "db_gestion_productos";
        $user = "root";
        $pass = "root";
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            return $pdo;
        } catch (\PDOException $e) {
            // Se puede agregar un log del error para depuración
            // error_log($e->getMessage()); 
            
            // Redirección en caso de error
            // Se debe colocar un exit() o die() después para detener la ejecución del script
            header("Location: index.php?error=1");
            exit(); 
        }
    }
}