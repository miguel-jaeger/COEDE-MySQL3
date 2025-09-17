<?php
// Usamos __DIR__ para una ruta de inclusión más segura.
require_once __DIR__ . '/Conexion.php';

class Producto {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM productos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

       public function registrar($nombre, $stock, $precio) {
        $sql = "INSERT INTO productos (nombre, stock, precio) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $stock, $precio]);
    }

    public function editar($id, $nombre, $stock, $precio) {
        $sql = "UPDATE productos SET nombre = ?, stock = ?, precio = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $stock, $precio, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>