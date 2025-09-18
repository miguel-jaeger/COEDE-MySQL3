<?php

//Modelo: Encargado de la lógica y acceso a datos (Producto).
// Usamos __DIR__ para una ruta de inclusión más segura.
require_once __DIR__ . '/Conexion.php';

class Producto {
    private $pdo; //conexión se guarda en la propiedad $pdo para usarla en los demás métodos.

    public function __construct() {   //PDO es una extensión de PHP que permite interactuar con bases de datos de forma segura y eficiente.
        $this->pdo = Conexion::conectar();//llama
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM productos ORDER BY id DESC");
        return $stmt->fetchAll();//obtienes todos los registros y los devuelves en un arreglo.,id más alto al más antiguo.
    }

    public function obtenerPorId($id) { //método busca un producto específico
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?"); //prepare() para evitar inyección SQL.
        $stmt->execute([$id]); //Ejecutas la consulta con el parámetro
        return $stmt->fetch(); //obtienes el primer registro que coincida y lo retornas
    }

       public function registrar($nombre, $cantidad, $precio) {
        // SQL query to insert a new product
        $sql = "INSERT INTO productos (nombre, stock, precio) VALUES (?, ?, ?)";
        
        try {
            // Prepare and execute the statement
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $cantidad, $precio]);
            
            // Redirect on success (optional, but good practice)
            header("Location: index.php?success=1");
            exit();

        } catch (\PDOException $e) {
            // Check if the error is due to a duplicate entry (Integrity constraint violation)
            if ($e->getCode() == '23000') {
                // If it's an integrity violation, redirect to the index page with an error parameter
                header("Location: index.php?error=1");
                exit();
            } else {
                // For any other type of PDOException, re-throw the exception or handle it differently
                // e.g., you could log the error and show a generic error page
                // error_log($e->getMessage());
                // header("Location: index.php?error=2");
                // exit();
                throw $e;
            }
        }
    }

    public function editar($id, $nombre, $stock, $precio) {
        $sql = "UPDATE productos SET nombre = ?, stock = ?, precio = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
         try {
            // Prepare and execute the statement
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $cantidad, $precio,$id]);
            
            // Redirect on success (optional, but good practice)
            header("Location: index.php?success=1");
            exit();

        } catch (\PDOException $e) {
            // Check if the error is due to a duplicate entry (Integrity constraint violation)
            if ($e->getCode() == '23000') {
                // If it's an integrity violation, redirect to the index page with an error parameter
                header("Location: index.php?error=1");
                exit();
            } else {
                // For any other type of PDOException, re-throw the exception or handle it differently
                // e.g., you could log the error and show a generic error page
                // error_log($e->getMessage());
                // header("Location: index.php?error=2");
                // exit();
                throw $e;
            }
        }
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>