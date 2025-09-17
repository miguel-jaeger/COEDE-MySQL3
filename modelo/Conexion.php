<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $db   = "gestion_productos";
        $user = "root";
        $pass = ""; // Cambia esto por tu contraseña de MySQL si tienes una
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
             // En un entorno de producción, no mostrarías el error detallado.
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
?>